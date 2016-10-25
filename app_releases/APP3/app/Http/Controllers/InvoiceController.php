<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Item;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Invoice_item;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;
class InvoiceController extends Controller
{

	public function __construct()
 	{
 			$this->middleware('auth');
 	}

	public function index(Invoice $invoice , Request $request)
	{
			$invoices = $invoice
												->select(array(
													'invoices.id as id',
						 							'invoices.date as date',
													'invoices.total as total',
													'invoices.type as type'))
												->orderBy('invoices.id','desc')->get();
		  $tableData = Datatables::of($invoices)
												->addColumn('actions', function ($data)
			{
					return view('invoice/partials.actionBtns')->with('controller','invoice')->with('id', $data->id)
									->render();
			});
			$customers=Customer::lists('name','id');
			$items=Item::lists('name','id');
			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				return view('invoice.index')
							->with('customers',$customers)
							->with('items',$items)
							->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

	public function create()
	{
	}

	public function store(Request $request)
	{
	}

	public function show()
	{
	}

	public function edit(Item $item , Request $request , $id)
	{
	}

	public function update(Request $request)
	{
	}

	public function destroy($id)
	{
				$item 	= Invoice_item::find($id);
				$item->delete();
				if($request->ajax())
				{
						return response(array('msg' => 'Removing Successfull'), 200)
										->header('Content-Type', 'application/json');
				}
				return redirect()->back();
	}
}
