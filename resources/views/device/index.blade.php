
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">

                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Devices</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">devices</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">


                <div class="col-md-12">

                  <div class="alert alert-info">
                      After adding a cellphone number, you can connect to WhatsApp by clicking the <b>QR code  icon</b>
                  </div>
         
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">devices</h4>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                  <button data-title="Create Data" data-src="{{ url('device/create') }}" class="btn btn-primary create-btn">Create</button>


               <table class="table table-striped" id="table">
  <thead>
     <th>phone</th>

  
  
    <th>Options</th>
  </thead>

  <tbody>
  </tbody>
</table>
                </div>






                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



<!-- Modal -->
<div class="modal fade" id="pairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="wrap-loader"></div>
        <center>
            <div class=" wrap-phone">
    
</div>
                <div id="qrcode">

</div>
        </center>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>



<style type="text/css">
    .lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #cef;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>


                @endsection


@push('scripts')
<script>

$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("device.json") !!}',
        columns: [
         {data:'phone',name:'device.phone'},
{data:'action',name:'action'}
     
        ]
    });
});




$(document).on('click', '.pair-btn', function() {
    // event.preventDefault();


    $("#qrcode").html('');
    var id = $(this).attr('data-id')
    var phone = $(this).attr('data-phone')
    $(".wrap-loader").html('<center><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center>');

    $(".wrap-phone").addClass('wrap-'+phone);

    $.get("{{ url('device/') }}/"+id+"/pair",function(){

    $(".wrap-loader").html('');


    });
    /* Act on the event */
});


</script>
@endpush


