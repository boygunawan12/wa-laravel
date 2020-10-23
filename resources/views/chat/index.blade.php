
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Chat</h4>
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
                                <a href="#">Chat</a>
                            </li>
                        </ul>
                    </div>
                       <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chat"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Quota Left</p>
                                                <h4 class="card-title">{{$quotaLeft}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">


                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Chat</h4>
                                </div>
                                <div class="card-body">
                                  
<div class="content">
    
        <div class="row">
        <div class="col-lg-6">
    <form id="form" onsubmit="return false" enctype="multipart/form-data">
{{--     $deviceId = $request->deviceId;
        $message = $request->message;
        $phone = $request->phone;
        $file = $request->file('file'); --}}
            <div class="form-group">
                <label>Device</label>
                <select name="from" class="select2 form-control" data-url="{{ url('device/list') }}"></select>
            </div>



            <div class="form-group">
                <label>To</label>
                <input type="text" name="to" class="form-control" placeholder="with country code">
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message"></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="file" class="form-control">
            </div>
            
            <div class="form-group">
            <button class="btn btn-primary btn-send btn-sm">Send</button>
                
            </div>
    </form>     

        </div>
       
    </div>       

</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






                @endsection

                @push('scripts')
                <script type="text/javascript">
                    $(document).on('click', '.btn-send', function() {
                        // event.preventDefault();
                        $(this).attr('disabled','disabled');
                        var formData = new FormData($("#form")[0]);

                        $.ajax({
                            headers:{
                                'x-token-access':"{{user()->token}}"
                            },
                            url: '{{ url('api/chat/sendMedia') }}',
                            type: 'POST',
                            dataType: 'JSON',
                            data: formData,

            contentType: false,
            processData: false,
                        })
                        .done(function(res) {
                            // console.log(res)
                            if(res.success){

           
                                $.notify({
                                  // options
                                  message: res.msg
                                },{
                                  // settings
                                  z_index:100000,
                                  type: 'success'
                                });

                                setTimeout(function(){
                                    location.reload();
                                },1000);

                            }
                            else{

           
                                    $.notify({
                                      // options
                                      message: res.msg
                                    },{
                                      // settings
                                      z_index:100000,
                                      type: 'danger'
                                    });

  $(".btn-send").removeAttr('disabled');



                            }

                            $(".btn-send").removeAttr('disabled');
                            // console.log("success");
                        })
                        .fail(function(data) {
                            

  // console.log(data);
  if (data.status==422) {
        $(".save-btn").removeAttr('disabled');

      $('input').removeClass('is-invalid');
      $('select').removeClass('is-invalid');
      $(".invalid-feedback").remove();

    // console.log(data.responseJSON);
    $.each(data.responseJSON.errors, function(index,val) {
      // console.log(index);
      // console.log(val);
      $('[name='+index+']').after("");

      $('[name='+index+']').addClass('is-invalid');
      var msg = '<div class="invalid-feedback">'+val+'</div>';
      $('[name='+index+']').after(msg);
       /* iterate through array or object */
    });
  }

  $(".btn-send").removeAttr('disabled');
                        })
                        .always(function() {
                            console.log("complete");
                        });
                        
                        /* Act on the event */
                    });
                </script>
                    {{-- expr --}}
                @endpush
