<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <label for="exampleInputPassword1">الاسم</label>
    <input type="text" class="form-control" name="name" placeholder="ادخل الاسم هنا" required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>

<div class="form-group">
    <label for="exampleInputPassword1">سعر المنتج الصغير</label>
    <input type="number" class="form-control" name="s_price"  required class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">سعر المنتج الوسط</label>
    <input type="number" class="form-control" name="m_price"   class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">سعر المنتج الكبير</label>
    <input type="number" class="form-control" name="l_price"   class="form-control">
    <span class="help-block with-errors errorName"></span>
</div>
<div class="form-group">
<label for="exampleInputFile">اختيار القسم</label>
<select  class="form-control"
 name="category_id">
 <option selected>اختر القسم الرئيسى </option>
 @foreach($categories as $category_id => $category_name)
  <option value="{!! $category_id !!}">{!! $category_name !!}</option>
  @endforeach
</select>
</div>
