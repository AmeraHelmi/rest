<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach ($admin as $row)
<div class="form-group">
      <label for="exampleInputPassword1">الأسم</label>
      <input type="text" name="name" required class="form-control" value="{{ $row->name }}">
      <span class="help-block with-errors errorName"></span>
      <label for="exampleInputPassword1">الأيميل</label>
      <input type="text" name="email" required class="form-control" value="{{ $row->email }}">
      <span class="help-block with-errors errorName"></span>
</div>

@endforeach
