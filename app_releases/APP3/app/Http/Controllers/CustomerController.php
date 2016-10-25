<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class CustomerController extends Controller
{

	public function __construct()
	{
				$this->middleware('auth');
  }

	public function index(Customer $customer , Request $request)
  {
				$customers = $customer
													->select(array('id', 'name','tel','address'))
													->orderBy('id','desc')->get();
		    $tableData = Datatables::of($customers)
													->addColumn('actions', function ($data)
				{
					return view('partials.actionBtns')->with('controller','customer')->with('id', $data->id)->render();
				});
		    if($request->ajax())
				  return DatatablePresenter::make($tableData, 'index');
	      return view('customer.index')
			         ->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

  public function store(Request $request)
  {
     		$customer = new Customer;
		    if($request->name)
		    {
		        $customer->name                =$request->name;
						$customer->tel               =$request->tel;
						$customer->address                 =$request->address;
						$customer->save();
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

  public function edit(Customer $customer , Request $request , $id)
	{

		   $customer       = Customer::find($id);
			 session(['customerid'   => $customer->id]);
			 return response(array('msg' => 'Adding Successfull', 'data'=> $customer->toJson() ), 200)
								->header('Content-Type', 'application/json');

	}

	public function update(Request $request)
	{
				$customer 	= Customer::find(session('customerid'));
				if(!empty($_FILES))
				{
						$customer->name    =$request->name;
						$customer->tel    =$request->tel;
						$customer->address    =$request->address;
				}
				else
				{
						$customer->name    =$request->name;
						$customer->tel    =$request->tel;
						$customer->address    =$request->address;
		    }
				$customer->save();
				if($request->ajax())
				{
						 return response(array('msg' => 'Adding Successfull'), 200)
						    		->header('Content-Type', 'application/json');
		    }
	}

	public function destroy($id)
	{
				$customer 	=customer::find($id);
				$customer->delete();
				if($request->ajax())
				{
			     return response(array('msg' => 'Removing Successfull'), 200)
						   		->header('Content-Type', 'application/json');
			  }
		    return redirect()->back();
	}

}
