
<!DOCTYPE html>
<html lang="en" dir="ltr" class="theme-default">

<head>
  
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  @yield('title')
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
      <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" href="{{ url("/assets/img/icon.ico") }}" type="image/x-icon"/>

  <!-- Fonts and icons -->
  <script src="{{ url("/assets/js/plugin/webfont/webfont.min.js") }}"></script>
    <script src="{{ url('js/app.js')}}" charset="utf-8"></script>

    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ url("/assets/css/fonts.min.css") }}']},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ url("/assets/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ url("/assets/css/atlantis.min.css") }}">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link rel="stylesheet" href="../assets/css/demo.css"> -->

  <!-- Required -->
    <link rel="stylesheet" type="text/css" href="{{ url("icons/fontawesome-free/css/all.min.css") }}">

  <link href="{{ url("/src/sweetalert2/dist/sweetalert2.min.css") }}" rel="stylesheet">


</head>

<body>
<body class="bg-primary-gradient">

            @yield('content')
               

            </div>
    

        <script>
            (function() {
                    'use strict';

                    // Self Initialize DOM Factory Components
                    domFactory.handler.autoInit();
                })
        </script>


    <!-- jQuery -->
    <script src="{{ url("/assets/js/core/jquery.3.2.1.min.js") }}"></script>
  <script src="{{ url("/assets/js/core/popper.min.js") }}"></script>
  <script src="{{ url("/assets/js/core/bootstrap.min.js") }}"></script>

    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function formatState (state) {
  if (!state.id) { return state.text; }
  var $state = $(
    'xxxx' + 
state.text +     '</span>'
 );
 return $state;
};


        function submit(){
            var data = $("#form").serialize();
            // console.log(data);
            $.ajax({
                action:"{{ url()->current() }}",
                method: "POST",
                data: data,
                dataType: "JSON",
                success:function(res){

                    if(res.success){
                        $(".result").html('<div class="alert alert-success">'+res.msg+'</div>');

                        @if (Request::segment(1)=='login'||Request::segment(1)=='register')
                          {{-- expr --}}

                        setTimeout(function(){
                            location.reload();
                        },2000);
                        @endif

                        @if (Request::segment(1)=='forgot-password')
                          {{-- expr --}}
                          @if (!empty(Request::get('uid')))
                            {{-- expr --}}
                            
                            setTimeout(function(){
                            location.href = "{{ url('login') }}";
                        },2000);
                          @endif
                        @endif
                    }
                    else{
        $("button[type=submit]").removeAttr('disabled');


      $('input').removeClass('is-invalid');
      $('select').removeClass('is-invalid');
      $(".invalid-feedback").remove();
      $(".country_form").removeClass('has-error');

                        $(".result").html('<div class="alert alert-danger">'+res.msg+'</div>');
                    }
                }
            })
.fail(function(data, textStatus, xhr) {
  // console.log("erroxr");

  // console.log(data);
  if (data.status==422) {
        $("button[type=submit]").removeAttr('disabled');

      $('input').removeClass('is-invalid');
      $('select').removeClass('is-invalid');
      $(".invalid-feedback").remove();
      $(".country_form").removeClass('has-error');


    // console.log(data.responseJSON);
    $.each(data.responseJSON.errors, function(index,val) {
      // console.log(index);
      // console.log(val);
      $('[name='+index+']').after("");
      var msg = '<div class="invalid-feedback">'+val+'</div>';

      $("."+index+"_form").addClass('has-error');
      $('[name='+index+']').addClass('is-invalid');
      $('[name='+index+']').after(msg);
       /* iterate through array or object */
    });
  }
});
        }

        $('button[type=submit]').click(function() {
    $(this).attr('disabled', 'disabled');
    $(this).parents('form').submit();
    submit();
});


    </script>

</body>

</html>