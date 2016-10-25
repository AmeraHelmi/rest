<?php namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Clockwork\Support\Laravel\Facade as Clockwork ;


class AdminController extends Controller
{

    public function __construct()
	  {
		      $this->middleware('auth');
	  }

	  public function index(Request $request)
	  {
		      $employees = User ::select(array('id', 'name', 'email', 'role'))
			                        ->where('email','!=',Auth::user()->email);
		      $tableData = Datatables::of($employees)
			                        ->setRowId(function ($data){	return 'employee_' . $data->id;	})
			                        ->addColumn('actions', function ($data)
					{
						  return view('partials.actionBtns')->with('controller','users')->with('id', $data->id)->render();
					});
		      $admin=User ::select(array('id', 'name', 'email', 'role'))
		 	                        ->where('id','=',Auth::user()->id)->get();

			    if($request->ajax())
				  return DatatablePresenter::make($tableData, 'admin.index');
		      return view('admin.index')
		              ->with('admin',$admin)
			            ->with('tableData', DatatablePresenter::make($tableData, 'admin.index'));
	}

	public function store(EmployeeRequest $request)
	{

	}

	public function edit(Request $request, $id)
	{
		      $employee 	= User::find($id);
 		      if($request->ajax())
          {
 			          return response(array('msg' => 'Adding Successfull', 'data'=> $employee->toJson() ), 200)
 								       ->header('Content-Type', 'application/json');
	        }
}

  public function update(Request $request, $id)
	{
    			$employee = User::find($id);
    			$employee->name 	      = $request->name ;
    			$employee->email 	      = $request->email ;
    			$employee->save();
    			if($request->ajax())
    			{
    				return response(array('msg' => 'Adding Successfull'), 200)
    									->header('Content-Type', 'application/json');
    			}
	}

	public function update_admin(Request $request)
	{
    			$employee = User::find(Auth::user()->id);
    			$employee->name 	      = $request->name ;
    			$employee->email 	      = $request->email ;
    			$employee->save();
          return redirect()->back();
	}

	public function destroy($id)
	{
    			$employee = User::find($id);
    			if(!$employee)
    			return 'not found';
    			$employee->delete();
    			if($request->ajax())
    			{
    				return response(array('msg' => 'Removing Successfull'), 200)
              			->header('Content-Type', 'application/json');
    	    }
    		  return redirect()->back();
	}

}
