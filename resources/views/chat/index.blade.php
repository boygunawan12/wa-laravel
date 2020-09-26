
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Welcome</h4>
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
                                <a href="#">Welcome</a>
                            </li>
                        </ul>
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
    <form id="form" onsubmit="return false">

            <div class="form-group">
                <label>Device</label>
                <select name="fromDevice" class="select2 form-control" data-url="{{ url('device/list') }}"></select>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" name="message"></textarea>
            </div>
            <div class="form-group">
            <button class="btn btn-primary btn-send btn-sm">Send</button>
                
            </div>
    </form>     

        </div>
        <div class="col-lg-6">
            <h5>Response</h5>
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
                        var form = $("#form").serialize();

                        $.ajax({
                            url: '{{ url('chat/send') }}',
                            type: 'POST',
                            dataType: 'JSON',
                            data: form,
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


                            }

                            $(".btn-send").removeAttr('disabled');
                            // console.log("success");
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                        
                        /* Act on the event */
                    });
                </script>
                    {{-- expr --}}
                @endpush
