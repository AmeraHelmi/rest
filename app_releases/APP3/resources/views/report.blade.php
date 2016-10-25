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
            <li><a href="{{ url('/')}}">الصفحة الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel')}}" target="_blank">لوحة التحكم</a></li>
            <li  class="active"><a href="{{ url('/report')}}" target="_blank">التقرير اليومى</a></li>
            <li><a href="{{ url('/menu',0)}}">المنيو</a></li>
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
  <form class="form-inline">
  <div class="form-group">
     <label style="margin-left: 16px;" for="date">التاريخ:</label>
     <label  class="form-control" id="date"  style="margin-left: 100px" >{{ $date }}</label>
   </div>
   <div class="form-group">
     <label for="pwd"> الحساب الاجمالى :</label>
     <label class="form-control" id="total" >{{ $amount }}</label>
   </div>
 </form>
 <div id="content" >

  <table class="table" style="border: 1px solid black;">
    <thead>
      <tr>
        <th style="text-align: center;">الحساب</th>
        <th style="text-align: center;">الوقت</th>
        <th style="text-align: center;">رقم الفاتورة</th>
      </tr>
    </thead>
    <tbody>
      @foreach($items as $item)
      <tr>
        <td style="text-align: center;border: 1px solid black;">{{ $item->total }}</td>
        <td style="text-align: center;border: 1px solid black;"><?php echo date("H:i:s",strtotime( $item->date )) ;?></td>

        <td style="text-align: center;border: 1px solid black;">{{ $item->id }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <ul class="pager" id="page">
     <li><a href="#" id="previous" data-id="{{ $item->id}}" >السابق</a></li>
     <li><a href="#" id="next" data-id="{{ $item->id}}">التالى</a></li>
    <li><a href="#" id="print">طباعة</a></li>
  </ul>
</div>
</div>

@endif
<script type='text/javascript'>
function asd($var)
{
  alert($var);
}
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$(document).on('click', '#print', function() {
  $('#page').hide();
  printData();
  $('#page').show();

});
$(document).on('click', '#next', function() {
      $lastid=$(this).data("id");
          $.ajax({
             url: "{{ url('items_loadmore')}}",
             type: "POST",
             data:{
              lastid:$lastid,
              type:"next",
             },
             success: function(data){
                    if(data != ''){

                      $('#content').html(data);
                    }

             },

         });
      });

      $(document).on('click', '#previous', function() {
            $lastid=$(this).data("id");
            $.ajax({
               url: "{{ url('items_loadmore')}}",
               type: "POST",
               data:{
                lastid:$lastid,
                type:"previous",
               },
               success: function(data){
                      if(data != ''){

                        $('#content').html(data);
                      }

               },

           });
            });
</script>
@endsection
