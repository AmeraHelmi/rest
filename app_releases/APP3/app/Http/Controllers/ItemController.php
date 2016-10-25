<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;
class ItemController extends Controller
{

	public function __construct()
 	{
 				$this->middleware('auth');
 	}

	public function index(Item $item , Request $request)
	{
				$items = $item
										->join('categories as c', 'c.id', '=', 'items.category_id')
										->select(array(
																	'items.id as id',
						 											'items.name as name',
																	'items.s_price as small',
																	'items.m_price as medium',
																	'items.l_price as large',
																	'c.name as cname'))
										->orderBy('items.id','desc')->get();
				$tableData = Datatables::of($items)
										->addColumn('actions', function ($data)
				{
									return view('partials.actionBtns')->with('controller','item')->with('id', $data->id)
													->render();
				});
		    if($request->ajax())
				    return DatatablePresenter::make($tableData, 'index');
				$categories=Category::lists('name','id');
				return view('item.index')
		  	      	->with('categories',$categories)
								->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
				$item = new Item;
				if($request->name)
				{
							$item->name           =$request->name;
							$item->s_price        =$request->s_price;
							$item->m_price        =$request->m_price;
							$item->l_price        =$request->l_price;
					  	$item->category_id    =$request->category_id;
							$item->save();
							if($request->ajax())
							{
										return response(array('msg' => 'Adding Successfull'), 200)
														->header('Content-Type', 'application/json');
							}
    		}
				else
				{
						return response(false, 200)
								   	->header('Content-Type', 'application/json');
		    }
	}

	public function show()
	{
	}

	public function edit(Item $item , Request $request , $id)
	{
				$item      = $item->find($id);
				session(['itemid'   => $item->id]);
				return response(array('msg' => 'Adding Successfull', 'data'=> $item->toJson() ), 200)
								->header('Content-Type', 'application/json');
	}

	public function update(Request $request)
	{
      	$item	= Item::find(session('itemid'));
				$item->name            =$request->name;
				$item->s_price         =$request->s_price;
				$item->m_price         =$request->m_price;
				$item->l_price         =$request->l_price;
			 	$item->category_id     =$request->category_id;
   			$item->save();
	 			if($request->ajax())
				{
	 					return response(array('msg' => 'Adding Successfull'), 200)
	 								->header('Content-Type', 'application/json');
	 	  	}
	}

	public function destroy($id)
	{
				$item 	= Item::find($id);
				$item->delete();
				if($request->ajax())
				{
						return response(array('msg' => 'Removing Successfull'), 200)
										->header('Content-Type', 'application/json');
		  	}
				return redirect()->back();
	}
}
