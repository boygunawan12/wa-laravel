
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
                                    <div class="card-head-row">
                                        <div class="card-title">List Chat</div>
                                        <div class="card-tools">

                                            <select style="width: 500px;" class="form-control select2 device" data-url="{{ url('device/list') }}">
                                                <option >Choose Device</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                  
<div class="content">
    
        
        <div class="result">
            <center><h3>Please Choose Your Device</h3></center>
        </div>

</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




<style type="text/css">
    .lds-ripple {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #cef;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}

</style>

                @endsection
@push('scripts')
<script type="text/javascript">
    $(document).on('change', '.device', function(event) {
        // event.preventDefault();
        load($(this).val());
        
        /* Act on the event */
    });

    function load(val){
               // var val = $(this).val();

        $(".result").html('<center><div class="lds-ripple"><div></div><div></div></div></center>');
        $.ajax({
            url: '{{ url('chat/list') }}',
            type: 'POST',
            dataType: 'JSON',
            data: {id: val},
        })
        .done(function(res) {
            // console.log("success");
            if(res.success){
                var html ='';
                html += '<table class="table table-striped">';
                html += '<thead>';
                html += '<th>From </th>';
                html += '<th>conversation</th>';
                html += '<th>time</th>';
                html += '<thead>';
                for (var i = 0; i < res.data.length; i++) {
                    // Things[i]
                    var data = res.data[i];
                    html += '<tr>';
                    html += '<td><img style="width:50px;height:50px;border-radius:50%;" src="'+data.avatarUrl+'" class="img  float-left"><b>'+data.name+'</b> <br>'+data.jid+'</td>';
                    html += '<td>'+data.message.conversation+'</td>';
                    html += '<td>'+data.message.messageTimestamp+'</td>';
                    html += '</tr>';
                }

                html += '</table>';
                $(".result").html(html);
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

                $(".result").html("");


            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
</script>
    {{-- expr --}}
@endpush


@push('scripts2')
<script type="text/javascript">
    // alert("x");
    var text1 = '628982382323'; 
$(".device option").filter(function() {
    console.log(this.text);
    return this.text == text1; 
}).attr('selected', true);


        window.Laravel = {
            'csrfToken': '{{ csrf_token() }}',
            'user': '{{user()->id}}'
        };



Echo.private('on-message-'+window.Laravel.user).listen('OnMessage', function(e) {
    // console.log("Wena!, a "+e.data.user_name + " le ha gustado uno de tus aportes");
    // console.log(e);
    console.log("x");
    // console.log(e);
    load(e.data);

});
</script>
    {{-- expr --}}
@endpush