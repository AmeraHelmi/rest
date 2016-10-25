<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="exampleInputPassword1">الاسم</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="ادخل اسم الشخص" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">رقم التليفون</label>
    <input type="text" class="form-control" name="tel" id="tel" placeholder="ادخل رقم التليفون"  class="form-control" >
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">العنوان</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="ادخل العنوان"  class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
