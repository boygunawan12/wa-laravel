<form action="{{url("users/".$data->id)}}"   method="post"  id="form"  onsubmit="return false">

{{csrf_field()}}
{{method_field("PUT")}}



<div class="form-group">
<label>First Name</label>
<input type='text' class='form-control' name='name' value='{{$data->name}}'>
</div>

<div class="form-group">
<label>Last Name</label>
<input type='text' class='form-control' name='last_name' value='{{$data->last_name}}'>
</div>

<div class="form-group">
<label>Email</label>
<input type='text' class='form-control' name='email' value='{{$data->email}}'>
</div>




<div class="form-group">
<label>Password</label>
<input type='password' class='form-control' name='password' >
</div>




<div class="form-group">
<label>Quota</label>
<input type='text' class='form-control' name='quota' value="{{$data->quota}}">
</div>




<div class="form-group">
<label>Verified</label>
<select class="form-control" name="verified">
	<option value="">Please Choose</option>
	<option {{$data->verified=='1'?'selected':''}} value="1">Verified</option>
	<option {{$data->verified=='0'?'selected':''}} value="0">Not Verified</option>
</select>
</div>

	


<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
	<option value="">Please Choose</option>
	<option {{$data->is_active=="1"?'selected':''}} value="1">Active</option>
	<option {{$data->is_active=="0"?'selected':''}} value="0">Disable</option>
</select>
</div>


</form>