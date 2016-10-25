<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Item;
use App\Models\Invoice;
use App\Models\Invoice_item;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Carbon\Carbon;
use Session;


class RestController extends Controller
{

	public function __construct()
	{
	}

	public function display(Request $request)
	{
		$item_id= $request->item_id;
		$item=new Item;
		$obj=$item->where('id',$item_id)->first();
		$output='';
		$output.='اسم الوجبة: '.$obj->name.'<br>'.'سعر القطعة (صغير):'.'  '.$obj->s_price.'<br>'.'سعر القطعة (وسط):'.'  '.$obj->m_price.'<br>'.'سعر القطعة (كبير):'.'  '.$obj->l_price;
		echo $output;
	}

	public function calculate(Request $request)
	{
		$total=$request->total;
		$size=$request->size;
		$price=$request->price;
		$amount=$request->amount;
		$name=$request->name;
		$total+=session('total');
		session(['total'=> $total]);
		$count=session('amount');
		$count=$count+$amount;
		session(['amount'=> $count]);
		for($x=0;$x<$amount;$x++)
		{
			session(['info'=>session('info').$name.'-'.$size.'&']);
		}
		echo session('total').'<center><div id="msg" style="font-size: 22px;">تمت اضافة( '.$amount.' )' .$name.'</div></center>';

	}

	public function get_items(Request $request)
	{
		$cat_id=$request->cat_id;
		$index=strpos($cat_id,',');
		$invoice_id=substr($cat_id,$index+1);
		$cat_id=substr($request->cat_id,0,$index);
		$item=new Item;
		$items=$item->select(array('items.id as id',
															'items.name as name',
															'items.s_price as s_price',
															'items.l_price as l_price',
														  'items.m_price as m_price'))
								->where('category_id',$cat_id)->get();
		$output='';
		if(count($items)>0)
		{
			$output.='
							<div>
								<div class="container" style="width:100%" >
										<ul class="list-group">
											<li class="list-group-item" style="font-size: 18px;font-family: inherit;">اسم الوجبة
												<span style="float:left;top:-19px;">L  </span> &emsp;
												<span style="float:left;top:-19px;padding-left: 70px;">M</span> &emsp;
												<span style="float:left;top:-19px;padding-left: 70px;">S</span>
					            </li>';
		  foreach ($items as $item)
			{
				 $output.='
				 <div id="item">
							 <li class="list-group-item" style="font-size: 18px;font-family: inherit;" data-id="'. $item->id .'">'. $item->name .'
							 <div id="plus">
								 <input type="number"  style="float: left;width: 40px;margin-top: -24px;" value="0" price="'.$item->l_price.' data="'. $item->l_price.','. $invoice_id.','. $item->id.',كبير"/>
						 </div>
						 <div id="plus" style="margin-left: 80;" >
							 <input type="number" style="float: left;width: 40px;margin-top: -24px;" value="0" price="'. $item->m_price .' data="'. $item->m_price.','. $invoice_id.','. $item->id.',وسط"/>
					 </div>
					 <div id="plus" style="margin-left: 160;" >
						 <input type="number" style="float: left;width: 40px;margin-top: -24px;" value="0" price="'.$item->s_price .' data="'. $item->s_price .','. $invoice_id.','. $item->id.',صغير"/>
				 </div>
				 </li>
			 </div>';
      }
			$output.='
			<center>

	</ul>
	<label style="color: blue;font-size: 18;"> ملاحظات
		<div id="info" style="font-size: 14;color: black;">0.0</div>
	</label>
	<br>
	<label style="color: red;font-size: 18;"> الحساب الاجمالى
		<div id="count" style="font-size: 24;color: blue;">0.0</div>
	</label>
';	}
		else
		{
			$output.='  <div  style="text-align: center;font-size: 20;color:red;">لا توجد وجبات ف هذا القسم <div>';
		}
		$output.='	</div></div>
		</div>
</div>
</div>
</div>
</div>
';

		 echo $output;
	 }
	 public function loadmore(Request $request)
	 {
		 $lastid=$request->lastid;
		 $customers=Customer::where('id','<',$lastid)->orderBy('id','desc')->take(2)->get();
		 $output='';
		 foreach($customers as $customer)
		 {
			 $output.='
			 <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
					 <div class="searchresult" >
							 <div class="row">
									 <div class="col-md-3 img-container">
											 <img src="{{ asset("/admin-ui/assets/img/images/person.jpg") }}" class="img-thumbnail img-responsive" alt="" />
									 </div>
									 <div class="col-md-9">
											 <h4>'. $customer->name .'</h4>
											 <h5>'. $customer->tel .' </h5>
									 </div>
									 <div class="row">
											 <div class="col-md-12">
													 <h5>'. $customer->address .'</h5>
											 </div>
									 </div>
									 <div class="hr"></div>
									 <div class="col-md-6">
										 <a href="{{ url("/user_edit",'.$customer->id.')}}" class="btn btn-primary btn-primary">تعديل البيانات الشخصية <span class="glyphicon glyphicon-check"></span></a>
									 </div>
									 <div class="col-md-6">
										 <a href="{{ url("/menu",'.$customer->tel.')}}" class="btn btn-primary btn-info">الذهـــــاب الى المنيو <span class="glyphicon glyphicon-plus-sign"></span></a>
									 </div>
							 </div>
					 </div>
			 </div>
			 ';
		 }
		 $output.='
		 <div id="remove">
		 		<div class="col-sm-6 col-lg-offset-3">
						<button class="btn btn-block btn-orange" id="btn_more" data-id="'.$customer->id .'"> للمــــزيد</button>
				</div>
		 </div>';
		 echo $output;
	 }
	public function index(Request $request)
	{
		$customer=new Customer;
		$customers=$customer->select(array('id','name','tel','address'))->orderBy('id','desc')->take(2)->get();
		return view('rest.index')
						->with('status',"index")
						->with('customers',$customers)
						->with('tel',session('tel'));
	}

	public function search(Request $request)
	{
		$search_word=$request->search;
			$customers=Customer::where("tel" , 'like', "%$search_word%")->get();
		return view('rest.index')
						->with('status',"search")
						->with('number',$search_word)
						->with('customers',$customers);
	}

	public function user_edit(Request $request,$id)
	{
		$customer=Customer::find($id);
		return view('rest.index')
						->with('status',"update")
						->with('customer',$customer);
	}

	public function user_add(Request $request,$id)
	{
		return view('rest.index')
						->with('status',"add")
						->with('number',$id);
	}

	public function user_update(Request $request)
	{
		$customer=Customer::find($request->id);
		$customer->name=$request->name;
		$customer->address=$request->address;
		$customer->save();
		return view('rest.index')
						->with('status',"view")
						->with('customer',$customer);

	}

	public function new_user(Request $request)
	{
		$customer=new Customer;
		$customer->tel=$request->id;
		$customer->name=$request->name;
		$customer->address=$request->address;
		$customer->save();
		$customers=Customer::where("tel" , 'like', "%$request->id%")->get();
		return view('rest.index')
						->with('status',"search")
						->with('number',$request->id)
						->with('customers',$customers);
	}
	public function all_items(Request $request,$id)
	{
		$total=session('total');
		$category=new Category;
		$categories=$category->select(array('categories.id as id',
																				'categories.name as name'))->get();
																				$item=new Item;
																				$items=$item->select(array('items.id as id',
																																	 'items.name as name',
																																	 'items.l_price as l_price',
																																	 'items.s_price as s_price',
																																 	 'items.m_price as m_price'))
																										 ->where('category_id',$id)->get();
																										 return view('rest.index')
																								 						->with('status',"menu")
																								 						->with('categories',$categories)
																														->with('items',$items)
																								 						->with('total',$total)
																								 						// ->with('invoice_id',$invoice->id)
																								 						// ->with('number',session('tel'))
																								 						;

	}
	public function save_session(Request $request)
	{
		$tel=$request->tel;
		session()->forget('total');
		session()->forget('amount');
		session()->forget('info');
		session(['total'=> 0]);
		session(['amount'=> 0]);
		session(['info'=>'']);
		// echo session('tel');
	}
	public function menu(Request $request,$id)
	{
		$total=session('total');
		session(['tel'=> $id]);

			$category=new Category;
		$categories=$category->select(array('categories.id as id',
								                        'categories.name as name'))->get();

		if(count($categories)>0)
		{
			// dd($categories[0]->id);
		$item=new Item;
		$items=$item->select(array('items.id as id',
															 'items.name as name',
															 'items.l_price as l_price',
															 'items.s_price as s_price',
														 	 'items.m_price as m_price'))
								 ->where('category_id',$categories[0]->id)->get();
		// $customer= new Customer;
		// $cust=$customer->select(array('id','name','tel'))->where('tel',session('tel'))->get();
		// $invoice=new Invoice;
		// $invoice->date=date('Y-m-d');
		// $invoice->customer_id=$cust[0]->id;
		// $invoice->type="محل";
		// $invoice->save();
		// $invoice_item=new Invoice_item;
		// $invoice_item->invoice_id=$invoice->id;
		// $invoice_item->save();
		// $invoice_item->date=date("Y-m-d",strtotime($invoice_item->created_at));
		// $invoice_item->save();
		return view('rest.index')
						->with('status',"menu")
						->with('categories',$categories)
						->with('items',$items)
						->with('total',$total)
						// ->with('invoice_id',$invoice->id)
						// ->with('number',session('tel'))
						;
		}
		// else {
		// 	// no categories
		// 	$customer=new Customer;
		// 	$customers=$customer->select(array('id','name','tel','address'))->orderBy('id','desc')->take(2)->get();
		// 	return view('rest.index')
		// 					->with('status',"index")
		// 					->with('customers',$customers);
		//
		// }
	}

	public function report(Request $request)
	{
		$datenow=date('Y-m-d');
		$total_amount=0;
		$invoice_t=new Invoice_item;
		$invoice_items=$invoice_t
												->join('invoices as inv','inv.id','=','invoice_items.invoice_id')
												->select(array(
																			'invoice_items.invoice_id as id',
																			'invoice_items.no_items',
																			'invoice_items.info as info',
																			'inv.total as total',
																			'inv.created_at as date'))
												->where('invoice_items.date','=',$datenow)
												->where('inv.total','!=',0)
											  ->get();

		foreach ($invoice_items as $item){
			$total_amount+=$item->total;
		}

		return view('report')
						->with('date',$datenow)
						->with('amount',$total_amount)
						->with('items',$invoice_items->take(10));
	}
	public function item_remove(Request $request)
	{
		$invoice_id=$request->invoice_id;
		$invoice=Invoice::find($invoice_id);
		$invoice->total-=$request->price;
		$invoice->save();
//
		$invoice_t=new Invoice_item;
		$invoice_item=$invoice_t->select(array('id','invoice_id','no_items','info'))->where('invoice_id',$invoice_id)->first();

		$invoice_item->no_items--;
		$invoice_item->info = preg_replace('/'.$request->item.'/','',$invoice_item->info,1);
		$invoice_item->save();
 	// 	echo $request->item;
		$inv=new Invoice;
		$inv_obj=$inv->select(array('total'))->where('id',$invoice_id)->first();

		$invoice_t=new Invoice_item;
		$invoice_item=$invoice_t
												->select(array(
																			'invoice_items.invoice_id',
																			'invoice_items.no_items',
																			'invoice_items.info as info'))
												->where('invoice_items.invoice_id','=',$invoice_id)
											  ->first();
		$arr=explode("&", $invoice_item->info);
		$items=array();
		$i=0;

		foreach ($arr as $obj)
		{
			$index1=strpos($obj,"-");
		 	$name=substr($obj,0,$index1);
			$type=substr($obj,$index1+1);
			$items[$i]['name']=$name;
			$items[$i]['type']=$type;
			$item=new Item;
			$obj_item=$item->select(array('id','name','s_price','l_price','m_price'))->where('name',$name)->first();
				if($type == "صغير")
				{
					 $items[$i]['price']=$obj_item->s_price;
					 $items[$i]['id']=$obj_item->id;
					//  $output.=$obj_item->name ."=".$obj_item->s_price."\n\r";
					 $i++;
				}
				if($type == "كبير")
				{
					$items[$i]['price']=$obj_item->l_price;
					$items[$i]['id']=$obj_item->id;
					// $output.=$obj_item->name ."=".$obj_item->l_price."\n\r";
					$i++;
				}
				if($type == "وسط")
				{
					$items[$i]['price']=$obj_item->m_price;
					$items[$i]['id']=$obj_item->id;
					// $output.=$obj_item->name ."=".$obj_item->m_price."\n\r";
					$i++;
				}
		}

	$output='';
 		unset($items[$i]);
// 		$output='';
 		$output.='
		<div style="background-color: #ede1ae;height:100%" id="printTable">

		 <div id="content">

		<table class="table" style="border: 1px solid black;">
		  <thead>
		    <tr>
		      <th style="text-align: center;">الظبط</th>
		      <th style="text-align: center;">السعر</th>
		      <th style="text-align: center;">الحجم</th>
		      <th style="text-align: center;">الوجبة</th>
		    </tr>
		  </thead>
		  <tbody>';
		    if(count($items) >0)
				{
		    foreach($items as $item)
				{
					$output.='
		    <tr>
		      <td style="text-align: center;border: 1px solid black;" id="remove_item">
					<a href="#"data-id="'.$item['price'].'" item="'. $item['name'] .'-'. $item['type'] .'" invoice="'.$invoice_id.'" >
								<span class="	glyphicon glyphicon-remove" style="color:red;font-size: 31px;"></span></a>
		      </td>
		      <td style="text-align: center;border: 1px solid black;">'. $item['price'] .'</td>
		      <td style="text-align: center;border: 1px solid black;">'. $item['type'] .'</td>
		      <td style="text-align: center;border: 1px solid black;">'. $item['name'] .'</td>
		    </tr>';
			}
			$output.='
		  </tbody>
		</table>
		<label style="color: red;font-size: 18;"> الحساب الاجمالى
		  <div id="count" style="font-size: 24;color: blue;">'. $inv_obj->total.'</div>
		</label>
		<ul class="pager">
		  <li><a href="#" id="print">طباعة</a></li>
		</ul>
		</div>
		</div>';
	}
$output.='<script type="text/javascript">


$("#remove_item a").on("click",function(){
  $id=$(this).data("id");
  $invoice_id=$(this).attr("invoice");
  $item=$(this).attr("item");
  $.ajax({
       url: "item_remove",
       type: "POST",//type of posting the data
       data:{
           price:$id,
           invoice_id:$invoice_id,
           item:$item
            },
       success: function (data) {

        $("#content").html(data);

       },
       error: function(xhr, ajaxOptions, thrownError){
          //what to do in error
          alert(error);
       },
       timeout : 15000//timeout of the ajax call
  });
});
</script>';

echo $output;

	}
	public function finish(Request $request)
	{
		$inv_type=$request->type;
		$inv=new Invoice;
		$inv->total=session('total');
		$inv->customer_tel=session('tel');
		$datenow=date('Y-m-d');
		$inv->date=$datenow;
		if($inv_type !=null)
		{
			$inv->type="محل";
		}
		else {
			$inv->type="ديليفرى";
		}
		$inv->save();
		session()->forget('total');
		$invoice_id=$inv->id;
		$inv_item=new Invoice_item;
		$inv_item->invoice_id=$invoice_id;
		$inv_item->no_items=session('amount');
		$inv_item->info=session('info');
		session()->forget('info');
		session()->forget('amount');
		$inv_item->save();
		$inv_item->date=date("Y-m-d",strtotime($inv_item->created_at));
		$inv_item->save();
		$arr=explode("&", $inv_item->info);
		unset($arr[count($arr)-1]);
		// dd($arr);
		// $output='';
		// 	$name=substr($obj,0,$index1);
		$items=array();
		$i=0;

		foreach ($arr as $obj)
		{
			$index1=strpos($obj,"-");
			$name=substr($obj,0,$index1);
			$type=substr($obj,$index1+1);
			$items[$i]['name']=$name;
			$items[$i]['type']=$type;
			$item=new Item;
			$obj_item=$item->select(array('id','name','s_price','l_price','m_price'))->where('name',$name)->first();
			if($type == "صغير")
			{
				$items[$i]['price']=$obj_item->s_price;
				$items[$i]['id']=$obj_item->id;
				//  $output.=$obj_item->name ."=".$obj_item->s_price."\n\r";
				$i++;
			}
			if($type == "كبير")
			{
				$items[$i]['price']=$obj_item->l_price;
				$items[$i]['id']=$obj_item->id;
				// $output.=$obj_item->name ."=".$obj_item->l_price."\n\r";
				$i++;
			}
			if($type == "وسط")
			{
				$items[$i]['price']=$obj_item->m_price;
				$items[$i]['id']=$obj_item->id;
				// $output.=$obj_item->name ."=".$obj_item->m_price."\n\r";
				$i++;
			}
		}
		$tel=session('tel');
		$customer=Customer::where('tel',$tel)->first();
		if($customer)
		{
			$name=$customer->name;
			$address=$customer->address;
		}
		else {
			# code...
			$name='';
			$address='';
		}
		return view('invoice')
					->with('invoice_id',$invoice_id)
					->with('total',$inv->total)
					->with('datenow',$datenow)
					->with('tel',$tel)
					->with('name',$name)
					->with('address',$address)
					->with('items',$items);
	}

	public function items_loadmore(Request $request)
	{
		if($request->type == "next")
		{
			// next
			$output='';
			$datenow=date('Y-m-d');
			$invoice_t=new Invoice_item;
			$invoice_items=$invoice_t
													->join('invoices as inv','inv.id','=','invoice_items.invoice_id')
													->select(array(
																				'invoice_items.invoice_id as id',
																				'invoice_items.no_items',
																				'invoice_items.info as info',
																				'inv.total as total',
																				'inv.created_at as date'))
													->where('invoice_items.date','=',$datenow)
													->where('inv.total','!=',0)
													->where('invoice_items.id','>',$request->lastid)
												  ->get();
			if(count($invoice_items) >0)
			{
				$output.='<table class="table" style="border: 1px solid black;">
		    							<thead>
		      							<tr>
		        							<th style="text-align: center;">الحساب</th>
		        							<th style="text-align: center;">الوقت</th>
		        							<th style="text-align: center;">الطلب</th>
		        							<th style="text-align: center;">رقم الفاتورة</th>
		      							</tr>
		    							</thead>
		    					<tbody>';
									foreach ($invoice_items as $item)
									{
										$output.='
		      								<tr>
		        									<td style="text-align: center;border: 1px solid black;">'. $item->total .'</td>
		        									<td style="text-align: center;border: 1px solid black;">'.date("H:i:s",strtotime( $item->date )).'</td>
		        									<td style="text-align: center;border: 1px solid black;">'. $item->info .'</td>
		        									<td style="text-align: center;border: 1px solid black;">'.$item->id.'</td>
		      								</tr>';
								}
		    				$output.='
		    									</tbody>
		  								</table>
										</div>
									</div>
									';
					}
					else
					{
						$output="no data";
					}
					echo $output;
			}
			else
			{
						// previous
						$output='';
						$datenow=date('Y-m-d');
						$invoice_t=new Invoice_item;
						$invoice_items=$invoice_t
																->join('invoices as inv','inv.id','=','invoice_items.invoice_id')
																->select(array(
																							'invoice_items.invoice_id as id',
																							'invoice_items.no_items',
																							'invoice_items.info as info',
																							'inv.total as total',
																							'inv.created_at as date'))
																->where('invoice_items.date','=',$datenow)
																->where('inv.total','!=',0)
																->where('invoice_items.id','<',$request->lastid)
																->get();
					if(count($invoice_items) >0)
					{
							$output.='<table class="table" style="border: 1px solid black;">
												<thead>
														<tr>
															<th style="text-align: center;">الحساب</th>
															<th style="text-align: center;">الوقت</th>
															<th style="text-align: center;">الطلب</th>
															<th style="text-align: center;">رقم الفاتورة</th>
														</tr>
													</thead>
													<tbody>';
													foreach ($invoice_items as $item)
													{
															$output.='
																		<tr>
																				<td style="text-align: center;border: 1px solid black;">'. $item->total .'</td>
																				<td style="text-align: center;border: 1px solid black;">'.date("H:i:s",strtotime( $item->date )).'</td>
																				<td style="text-align: center;border: 1px solid black;">'. $item->info .'</td>
																				<td style="text-align: center;border: 1px solid black;">'.$item->id.'</td>
																		</tr>';
													}
													$output.='
																</tbody>
															</table>
														</div>
													</div>
												';
										}
										else
										{
											$output="no data";
										}
										echo $output;
									}
							}
}
