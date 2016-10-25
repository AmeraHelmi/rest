<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="exampleInputPassword1">قسم جديد</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="ادخل اسم القسم هنا " required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
