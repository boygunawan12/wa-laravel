<form action="{{url("device")}}" method="post"    id="form"  onsubmit="return false">

{{csrf_field()}}


<div class="form-group">
<label>Phone</label>
<input type='text' class='form-control' name='phone' value='' placeholder="Enter your phone with country code (Ex: 628123456)">
</div>
		
</form>
