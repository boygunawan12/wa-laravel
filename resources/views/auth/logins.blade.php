<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>whatsapi-231c67c0-f4ff-11ea-bc13-4d79f46ba561</title>
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
<body class="bg-primary-gradient">


						<div class="col-md-5 mt-5" style="float: none;margin: 0 auto;">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Login</div>
									
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="" class="form-control">
									</div>

									<div class="form-group">
										<label>Password</label>
										<input type="text" name="" class="form-control">
									</div>

									<div class="form-group">
										<button class="btn btn-primary btn-block">LOGIN</button>
									</div>

								</div>
							</div>
						</div>
				

</body>
</html>