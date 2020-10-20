<form action="{{url("affiliates/".$data->id)}}"   method="post"  id="form"  onsubmit="return false">

{{csrf_field()}}
{{method_field("PUT")}}




<div class="form-group">
<label>Username</label>

<input type='text' class='form-control' name='name' value='{{$data->username}}'>

</div>


<div class="form-group">
<label>Password</label>
<input type='password' class='form-control' name='password' >
</div>

</form>