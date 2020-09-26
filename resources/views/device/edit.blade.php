<form action="{{url("device/".$data->id)}}"   method="post"  id="form"  onsubmit="return false">

{{csrf_field()}}
{{method_field("PUT")}}

<div class="form-group">
<label>phone</label>
<input type='text' class='form-control' name='phone' value='{{$data->phone}}'>
</div>


	
</form>