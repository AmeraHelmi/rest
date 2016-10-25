<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class CategoryController extends Controller
{

	public function __construct()
  {
		  $this->middleware('auth');
  }

  public function index(Category $cat , Request $request)
  {
		  $categories = $cat ->select(array('id', 'name'))
												 ->orderBy('id','desc')->get();

		  $tableData = Datatables::of($categories)
								         ->addColumn('actions', function ($data)
			{
					return view('partials.actionBtns')
									->with('controller','category')
									->with('id', $data->id)
									->render();
			});
		  if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
	    return view('category.index')
			      ->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

	public function store(Request $request)
  {
				$cat = new Category;
			  $cat->name                =$request->name;
				$cat->save();
				if($request->ajax())
				{
							return response(array('msg' => 'Adding Successfull'), 200)
											->header('Content-Type', 'application/json');
				}
				else
				{
							return response(false, 200)
										->header('Content-Type', 'application/json');
				}
	}

	public function edit(Category $cat , Request $request , $id)
	{
				$cat       = Category::find($id);
				session(['catid'   => $cat->id]);
				return response(array('msg' => 'Adding Successfull', 'data'=> $cat->toJson() ), 200)
								->header('Content-Type', 'application/json');

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update(Request $request)
	{
 					$cat 	= Category::find(session('catid'));
		 			$cat->name              =$request->name;
		 			$cat->save();
					if($request->ajax())
					{
	 						return response(array('msg' => 'Adding Successfull'), 200)
	 										->header('Content-Type', 'application/json');
	 				}
	}

	public function destroy($id)
	{
					$cat 	= Category::find($id);
					$cat->delete();
					if($request->ajax())
					{
							return response(array('msg' => 'Removing Successfull'), 200)
											->header('Content-Type', 'application/json');
			    }
					return redirect()->back();
	}
}
