<form action="{{url("affiliates")}}" method="post"    id="form"  onsubmit="return false">

{{csrf_field()}}




<div class="form-group">
<label>Username</label>
<input type='text' class='form-control' name='username' >
</div>


<div class="form-group">
<label>Password</label>
<input type='password' class='form-control' name='password' >
</div>

</form>
