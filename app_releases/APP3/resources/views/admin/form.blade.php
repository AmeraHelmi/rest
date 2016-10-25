<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
      <label for="exampleInputPassword1">أسم المستخدم</label>
      <input type="text" name="name" required class="form-control">
      <span class="help-block with-errors errorName"></span>
      <label for="exampleInputPassword1">الأيميل</label>
      <input type="text" name="email" required class="form-control">
      <span class="help-block with-errors errorName"></span>
</div>
