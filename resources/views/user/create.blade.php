<form action="{{url("users")}}" method="post"    id="form"  onsubmit="return false">

{{csrf_field()}}




<div class="form-group">
<label>First Name</label>
<input type='text' class='form-control' name='name' >
</div>

<div class="form-group">
<label>Last Name</label>
<input type='text' class='form-control' name='last_name' >
</div>

<div class="form-group">
<label>Email</label>
<input type='text' class='form-control' name='email' >
</div>



<div class="form-group">
<label>Quota</label>
<input type='text' class='form-control' name='quota' >
</div>


<div class="form-group">
<label>Password</label>
<input type='password' class='form-control' name='password' >
</div>


<div class="form-group">
<label>Verified</label>
<select class="form-control" name="verified">
	<option value="">Please Choose</option>
	<option value="1">Verified</option>
	<option value="0">Not Verified</option>
</select>
</div>

<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
	<option value="">Please Choose</option>
	<option value="1">Active</option>
	<option value="0">Disable</option>
</select>
</div>

</form>
