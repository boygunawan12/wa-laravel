<form action="{{url("device")}}" method="post"    id="form"  onsubmit="return false">

{{csrf_field()}}


<div class="form-group">
<label>phone</label>
<input type='text' class='form-control' name='phone' value=''>
</div>
		
</form>