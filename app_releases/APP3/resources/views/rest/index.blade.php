@extends('app');
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
            <li><a href="{{ url('/report')}}" target="_blank">التقرير اليومى</a></li>
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
<!-- Search Navbar - END -->
<div id="search_area">
  @if($status == 'index')
      @if(count($customers) >0)
          @foreach($customers as $customer)
              <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
                  <div class="searchresult" >
                      <div class="row">
                          <div class="col-md-3 img-container">
                              <img src="{{ asset('/admin-ui/assets/img/images/person.jpg') }}" class="img-thumbnail img-responsive" alt="" />
                          </div>
                          <div class="col-md-9">
                              <h4> {{ $customer->name }}</h4>
                              <h5>{{ $customer->tel }} </h5>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <h5>{{ $customer->address }}</h5>
                              </div>
                          </div>
                          <div class="hr"></div>
                          <div class="col-md-6">
                            <a href="{{ url('/user_edit',$customer->id)}}" class="btn btn-primary btn-primary">تعديل البيانات الشخصية <span class="glyphicon glyphicon-check"></span></a>
                          </div>
                          <div class="col-md-6">
                            <a href="{{ url('/menu',$customer->tel)}}" id="s_session" data="{{ $customer->tel}}" class="btn btn-primary btn-info">الذهـــــاب الى المنيو <span class="glyphicon glyphicon-plus-sign"></span></a>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
            <!-- load more  -->
            <div id="remove">
         <div class="col-sm-6 col-lg-offset-3">
           <button class="btn btn-block btn-orange" id="btn_more" data-id="{{ $customer->id  }}"> للمــــزيد</button>
         </div>
         </div>
            @endif
            @endif
@if($status == 'search')
    @if(count($customers) >0)
        @foreach($customers as $customer)
            <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
                <div class="searchresult" >
                    <div class="row">
                        <div class="col-md-3 img-container">
                            <img src="{{ asset('/admin-ui/assets/img/images/person.jpg') }}" class="img-thumbnail img-responsive" alt="" />
                        </div>
                        <div class="col-md-9">
                            <h4> {{ $customer->name }}</h4>
                            <h5>{{ $customer->tel }} </h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>{{ $customer->address }}</h5>
                            </div>
                        </div>
                        <div class="hr"></div>
                        <div class="col-md-6">
                          <a href="{{ url('/user_edit',$customer->id)}}" class="btn btn-primary btn-primary">تعديل البيانات الشخصية <span class="glyphicon glyphicon-check"></span></a>
                        </div>
                        <div class="col-md-6">
                          <a href="{{ url('/menu',$customer->tel)}}" id="s_session" data="{{ $customer->tel}}"  class="btn btn-primary btn-info">الذهـــــاب الى المنيو <span class="glyphicon glyphicon-plus-sign"></span></a>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
          @else
          <!-- {{-- no match customers --}} -->
          <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
              <div class="searchresult">
                  <div class="row">
                      <div class="col-md-3 img-container">
                          <img src="{{ asset('/admin-ui/assets/img/notfound.png') }}" class="img-thumbnail img-responsive" alt="" />
                      </div>
                      <div class="col-md-9">
                          <h3 style="text-align:center;"> عفوا ! لا يوجد لدينا هذا المستخدم</h3>
                      </div>
                      <div class="hr"></div>
                      <div class="col-md-6">
                          <a href="{{ url('/user_add',$number)}}" class="btn btn-primary btn-primary">اضافة جديد<span class="glyphicon glyphicon-check"></span></a>
                      </div>
                  </div>
              </div>
          </div>
          @endif
        @endif
      </div>
        @if($status == 'update')
        <!-- {{-- update --}} -->
        <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
            <div class="searchresult">
                <div class="row">
                    <div class="col-md-9">
                        <h1 style="text-align:center;">{{ $customer->tel }} </h1>
                    </div>
                    <form class="navbar-form"  action="{{url('/user_update')}}" method="post">
                        <input type="hidden" class="form-control" value="{{$customer->id}}" name="id" >
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $customer->name }}" name="name" style="width: 100%;height: 50;font-size:28;"/>
                            <br/>
                            <br/>
                            <input type="text" class="form-control" value="{{ $customer->address }}" name="address" style="width: 100%;height: 50;font-size:28;"/>
                        </div>
                        <br/>
                        <br/>
                        <div class="col-md-6">
                             <button style="margin-right: 150;" class="btn btn-primary btn-primary" type="submit">
                             <i class="glyphicon glyphicon-check">تعديل</i></button>
                        </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
    @endif
    @if($status == 'add')
    <!-- {{-- update --}} -->
    <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
        <div class="searchresult">
            <div class="row">
                <div class="col-md-9">
                    <h1 style="text-align:center;">{{ $number }} </h1>
                </div>
                <form class="navbar-form"  action="{{url('/new_user')}}" method="post">
                      <input type="hidden" class="form-control" name="id" value="{{ $number}}">
                      <div class="form-group">
                          <input type="text" class="form-control" name="name" placeholder="ادخل الاسم هنا .." style="width: 100%;height: 50;font-size:28;"/>
                          <br/>
                          <br/>
                          <input type="text" class="form-control"  name="address" placeholder="ادخل العنوان هنا .." style="width: 100%;height: 50;font-size:28;"/>
                      </div>
                      <br/>
                      <br/>
                      <div class="col-md-6">
                          <button style="margin-right: 150;" class="btn btn-primary btn-primary" type="submit">
                          <i class="glyphicon glyphicon-check">اضافة</i></button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
    </div>
    @endif
    @if($status == 'view')
    <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;">
        <div class="searchresult" >
            <div class="row">
            <div class="col-md-3 img-container">
                <img src="{{ asset('/admin-ui/assets/img/images/person.jpg') }}" class="img-thumbnail img-responsive" alt="" />
            </div>
            <div class="col-md-9">
                <h4> {{ $customer->name }}</h4>
                <h5>{{ $customer->tel }} </h5>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>{{ $customer->address }}</h5>
                </div>
            </div>
            <div class="hr"></div>
                <div class="col-md-6">
                    <a href="{{ url('/user_edit',$customer->id)}}" class="btn btn-primary btn-primary">تعديل البيانات الشخصية <span class="glyphicon glyphicon-check"></span></a>
                </div>
                <div class="col-md-6">
                    <a href="{{ url('/menu',$customer->tel)}}" id="s_session" data="{{ $customer->tel }}"class="btn btn-primary btn-info">الذهـــــاب الى المنيو <span class="glyphicon glyphicon-plus-sign"></span></a>
                </div>
          </div>
    </div>
  </div>
@endif
@if($status == 'menu')

  <!-- {{-- update --}} -->
  <div class="col-md-6 col-md-offset-3" style="background-color: #f1e09b;margin-right:0%;width:95%">
      <div class="searchresult" style="height:100%;">
        <!-- <a href="#" id="test">here </a> -->
        <div id="asden"></div>
          <div class="row">
              <div class="container" style="width:100%">
                  <!-- <h1 style="text-align:center;"> </h1> -->
                  <ul class="nav nav-tabs" id="test">
                    @if(count($categories) >= 1)
                      @foreach($categories as $category)
                        <li style="float:right;"  >
                          <a  href="{{ url('/all_items',$category->id)}}" style="font-size:20;" >
                            {{ $category->name }}
                          </a>
                        </li>
                      @endforeach

                    @endif
                  </ul>
                  <div style="height:50%" id="home">
                    <div >
                				<div class="container" style="width:100%" >
                          @if(count($items)> 0)
                		<ul class="list-group">
                      <li class="list-group-item" style="font-size: 18px;font-family: inherit;">اسم الوجبة

                        <span style="float:left;top:-19px;">L  </span> &emsp;
                        <span style="float:left;top:-19px;padding-left: 70px;">M</span> &emsp;
                        <span style="float:left;top:-19px;padding-left: 70px;">S</span>
                </li>
                		@foreach ($items as $item)
                    <div id="item">
                					<li class="list-group-item element" style="font-size: 18px;font-family: inherit;" data-id="{{ $item->id }}" > {{ $item->name }}
                          <div id="plus">
                            <input type="number"  style="float: left;width: 40px;margin-top: -24px;" value="0" price="{{ $item->l_price }}" size="كبير" name="{{ $item->name}}" />
                        </div>
                        <div id="plus" style="margin-left: 80;" >
                          <input type="number" style="float: left;width: 40px;margin-top: -24px;" value="0" price="{{ $item->m_price }}" size="وسط" name="{{ $item->name}}"/>
                      </div>
                      <div id="plus" style="margin-left: 160;" >
                        <input type="number" style="float: left;width: 40px;margin-top: -24px;" value="0" price="{{ $item->s_price }}" size="صغير"  name="{{ $item->name}}"/>
                    </div>
                    </li>
                  </div>
                    @endforeach
                    <center>

                </ul>
                <label style="color: blue;font-size: 18;"> ملاحظات
                	<div id="info" style="font-size: 14;color: black;">0.0</div>
                </label>
                <br>
                <label style="color: red;font-size: 18;"> الحساب الاجمالى
                	<div id="count" style="font-size: 24;color: blue;">{{ $total }}</div>
                </label>
                <div >
                </hr>
                  <form method="POST" action="{{url('/finish')}}">
                    <input type="checkbox" name="type" style="margin-top: 55px;" id="type" value="ديليفرى">
                     <span style="color: red;font-size: 23px;">ديليفرى</span><br>

                  <button class="btn btn-block btn-orange"  type="submit"  > انهاء</button>
                </form>
                </div>
                @else
                <div  style="text-align: center;font-size: 20;color:red;">لا توجد وجبات ف هذا القسم <div>
                @endif
                		</div></div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  @endif
</div>

<script type='text/javascript'>
function asd($var)
{
  alert($var);
}
$("#item li").hover(function(){
  $id=$(this).data("id");
  $.ajax({
       url: "{{ url('display')}}",
       type: "POST",//type of posting the data
       data:{
           item_id:$id
         },
       success: function (data) {
        //  $("#asden").append(
        //   'ss');
        $('#info').html(data);

       },
       error: function(xhr, ajaxOptions, thrownError){
          //what to do in error
          alert(error);
       },
       timeout : 15000//timeout of the ajax call
  });


});

$(document).ready(function(e) {
$("#plus input").on('blur', function(e) {
// $xx+=$(this).attr("data");
  //
  $price=$(this).attr("price");
  $size=$(this).attr("size");
   $name=$(this).attr("name");
   $amount=$(this).val();
   $total=$price * $amount;
   $.ajax({
       url: "{{ url('calculate')}}",
       type: "POST",//type of posting the data
       data:{
            name:$name,
            price:$price,
            size:$size,
            total:$total,
            amount:$amount

         },
       success: function (data) {

        $('#count').html(data);
       },
       error: function(xhr, ajaxOptions, thrownError){
          //what to do in error
          // alert("error");
          alert("error");

       },
       timeout : 15000//timeout of the ajax call
  });
        // $('#count').html($data);
      });
});

$(document).ready(function(e) {
$("#s_session").on('click', function(e) {
  $tel=$(this).attr("data");
   alert($tel);
  $.ajax({
     url: "{{ url('save_session')}}",
     type: "POST",
     data:{
      tel:$tel,
     },
     success: function(data){
          // alert(data);
     },
     error:function()
     {
        //  alert("error");
     },
 });

      });
});


$(document).ready(function(e) {

  // $('#load_gif').hide();
$(document).on('click', '#btn_more', function() {
     $('#btn_more').html('...جارى التحميل');
      $lastid=$(this).data("id");
          $.ajax({
             url: "{{ url('loadmore')}}",
             type: "POST",
             data:{
              lastid:$lastid
             },
             success: function(data){
                    if(data != ''){
                      $('#remove').remove();
                      $('#search_area').append(data);
                    }
               else{
                  $('#btn_more').html('لأ يوجد بيانات اخرى');
                }
             },
             error:function()
             {
                 $('#btn_more').html('لأ يوجد بيانات اخرى');
             },
         });
      });
      });

</script>
@endsection
