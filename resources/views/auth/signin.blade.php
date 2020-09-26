<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign In</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ url('css/animate.min.css') }}">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">

                    <h1 class="h1 text-gray-900 mb-4">sqltocrud<br>
                      
                    </h1>
                  </div>

                  <center>
                    
                  <a href="{{ route('login.provider', 'google') }}" class="btn btn-danger">
                    <i class="fab fa-google"></i>
                  {{ __('Google Sign in') }}</a>

                    <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-primary"><i class="fab fa-facebook"></i> Facebook</a>



                  </center>

               
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('js/sb-admin-2.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('js/bootstrap-notify.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('bower/jquery-validation/dist/jquery.validate.min.js') }}"></script>

</body>
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(document).on('click', '.btn-submit', function(event) {
    // event.preventDefault();


      $("#form").validate();

      if ($("#form").valid()) {
    $(this).text('Sedang Login...');
    $(this).attr('disabled','disabled');
    $.ajax({
      url: '{{ url()->current() }}',
      type: 'POST',
      dataType: 'JSON',
      data: $("#form").serialize(),
      success:function(res){
        $(".btn-submit").text('Login');
        $(".btn-submit").removeAttr('disabled');
        
        if (res.success) {
          $.notify({
  // options
  message: res.msg
},{
  // settings
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
  type: 'danger'
});
    
        }
      }
    })
  }
    
    /* Act on the event */
  });
</script>
<style type="text/css">
  .error{
    font-size: 18px;
    width: 100%;
  }
  .error{
    color: red;
  }
</style>
</html>
