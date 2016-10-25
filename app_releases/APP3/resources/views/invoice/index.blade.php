@extends('admin')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
		    <div class="row">
            <div class="col-md-12">
            <br>
                <ul class="alerts-list delete"></ul>



                  <div class="widget-content-white glossed">
		                  <div class="padded">
				                    <table id="countries" class="table table-striped table-bordered table-hover datatable">
						                        <thead>
								                            <tr>
                                              <th class="col-md-1">رقم الفاتورة</th>
                                                <th class="col-md-2">تاريخ الفاتورة</th>
									                              <th class="col-md-3">النوع</th>
                                                <th class="col-md-2">الاجمالى</th>
                                                <th class="col-md-2">خيارات</th>
								                            </tr>
						                        </thead>
						                        <tbody>
								                    @foreach ($tableData->getData()->data as $row)
								                          <tr>
                                            <td>{{ $row->id }}</td>
                                              <td>{{ $row->date }}</td>
                                              <td>{{ $row->type }}</td>
                                              <td>{{ $row->total }}</td>
                                              <td>{!! $row->actions !!}</td>
								                          </tr>
								                    @endforeach
						                        </tbody>
				                      </table>
		                      </div>
                      </div>


					        </div>
				      </div>
			    </div>
		</div>
	</div>
@endsection
@section('scripts')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
      !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
        $(document).ready(function() {


		function populateForm(response, frm)
    {
        var i;
        for (i in response) {
            if (i in frm.elements)
                frm.elements[i].value = response[i];
        }
    }



	oTable = $('#countries').DataTable({
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"deferLoading": {{ $tableData->getData()->recordsFiltered }},
		"columns": [
      {data: 'id', name: 'id'},
      {data: 'date', name: 'date'},
			{data: 'type', name: 'type'},
      {data: 'total', name: 'total'},
      {data: 'actions', name: 'actions', orderable: false, searchable: false}
		]
	});
});
</script>
<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>
@endsection
