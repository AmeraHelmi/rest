<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{

	public function __construct()
	{
		   $this->middleware('auth');
  }

	public function index()
	{
			return view('home');
	}

	public function create(Request $request)
	{
	}

	public function store()
	{
	}

	public function show()
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}

}
