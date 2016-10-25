@extends('app')
@section('content')

<div class="container">
    <div class="page-header">
    </div>

<!-- Search Navbar - START -->
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <span></span>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel')}}" target="_blank">لوحة التحكم</a></li>
            <li  ><a href="{{ url('/report')}}" target="_blank">التقرير اليومى</a></li>
            <li><a href="{{ url('/menu',0)}}" target="_blank">المنيو</a></li>
        </ul>
        <div class="col-sm-3 col-md-3 pull-left">
            <form class="navbar-form" role="search" action="{{url('/search')}}" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="ابحث هنا .." name="search" >
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
@if(count($items) >0)

<div style="background-color: rgba(255,255,255,1);height:100%;width: 653px;margin-left: 368px;" id="printTable">
<!--  -->
  <div style="font-size: 23px;color: black;margin-right: 261px;" id="date">{{ $datenow }}</div>
<br>
@if( $tel != 0)
<div id="cust">
<label style="color: blue;font-size: 18px;"> اسم العميل
  <div style="font-size: 14px;color: black;">{{ $name}}</div>
</label>
<br>
<label style="color: blue;font-size: 18px;"> تليفون العميل
  <div style="font-size: 14px;color: black;">{{ $tel}}</div>
</label>
<br>
<label style="color: blue;font-size: 18px;">عنوان العميل
  <div style="font-size: 14px;color: black;">{{ $address}}</div>
</label>
</div>
@endif
 <div id="content">
<table class="table" style="border: 1px solid black;">
  <thead>
    <tr>
      <th style="text-align: center;border: 1px solid black;">الظبط</th>
      <th style="text-align: center;border: 1px solid black;">السعر</th>
      <th style="text-align: center;border: 1px solid black;">الحجم</th>
      <th style="text-align: center;border: 1px solid black;">الوجبة</th>
    </tr>
  </thead>
  <tbody>

    @foreach($items as $item)
    <tr>
      <td style="text-align: center;" id="remove_item">
            <a href="#"data-id="{{ $item['price']}}" item="{{ $item['name'] }}-{{ $item['type'] }}" invoice="{{ $invoice_id}}" >
              <span class="	glyphicon glyphicon-remove" style="color:red;font-size: 31px;"></span></a>
      </td>
      <td style="text-align: center;">{{ $item['price'] }}</td>
      <td style="text-align: center;">{{ $item['type'] }}</td>
      <td style="text-align: center;">{{ $item['name'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<label style="color: red;font-size: 18;"> الحساب الاجمالى
  <div id="count" style="font-size: 24;color: blue;">{{ $total }}</div>
</label>
<ul class="pager" id="sprint">
  <li><a href="#" id="print">طباعة</a></li>
</ul>
</div>
</div>
@else
<div style="text-align: center;font-size: 28px;font-weight: bold;">لا توجد محتوى</div>
@endif
<script type='text/javascript'>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$(document).on('click', '#print', function() {
  $("td:first-child").hide();
  $("th:first-child").hide();
  $("#cust ").css('float','right');
  $("#date").css('float','right');
  $("#cust label").css('float','right');
  $("#cust label").css('float','right');
   $("#sprint").hide();
  printData();
  $("td:first-child").show();
  $("th:first-child").show();
  $("#cust ").css('float','left');
   $("#sprint").show();
});

$('#remove_item a').on('click',function(){
  $id=$(this).data("id");
  $invoice_id=$(this).attr("invoice");
  $item=$(this).attr("item");
  $.ajax({
       url: "{{ url('item_remove')}}",
       type: "POST",//type of posting the data
       data:{
           price:$id,
           invoice_id:$invoice_id,
           item:$item
            },
       success: function (data) {
        //  $("#asden").append(
        //   'ss');
        $('#content').html(data);

       },
       error: function(xhr, ajaxOptions, thrownError){
          //what to do in error
          alert(error);
       },
       timeout : 15000//timeout of the ajax call
  });
});
</script>
@endsection
