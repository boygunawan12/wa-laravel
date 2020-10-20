<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Pesan.digital</title>
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



    <link rel="stylesheet" type="text/css" href="{{ url("/src/select2/dist/css/select2.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/src/select2-bootstrap-theme/dist/select2-bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/src/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/src/style.css") }}">

</head>
<body>
  <div class="wrapper">
    <div class="main-header">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="blue">
        
        <a href="{{url("/")}}" class="logo">
          <img src="{{ url('message.png') }}" alt="navbar brand" class="navbar-brand" style="width: 30px;height: 30px;"> <span class="text-white" style="font-style: italic;">Pesan.digital</span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
          </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
       
      </nav>
      <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    @include("sidebar")
    <!-- End Sidebar -->

    <div class="main-panel">
      @yield("content",view("home"))
      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.themekita.com">
                  ThemeKita
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Help
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright ml-auto">
            2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
          </div>        
        </div>
      </footer>
    </div>
    
    <!-- Custom template | don't include it in your project! -->
    <div class="custom-template">
      <div class="title">Settings</div>
      <div class="custom-content">
        <div class="switcher">
          <div class="switch-block">
            <h4>Logo Header</h4>
            <div class="btnSwitch">
              <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
              <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
              <br/>
              <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
              <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Navbar Header</h4>
            <div class="btnSwitch">
              <button type="button" class="changeTopBarColor" data-color="dark"></button>
              <button type="button" class="changeTopBarColor" data-color="blue"></button>
              <button type="button" class="changeTopBarColor" data-color="purple"></button>
              <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
              <button type="button" class="changeTopBarColor" data-color="green"></button>
              <button type="button" class="changeTopBarColor" data-color="orange"></button>
              <button type="button" class="changeTopBarColor" data-color="red"></button>
              <button type="button" class="changeTopBarColor" data-color="white"></button>
              <br/>
              <button type="button" class="changeTopBarColor" data-color="dark2"></button>
              <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
              <button type="button" class="changeTopBarColor" data-color="purple2"></button>
              <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
              <button type="button" class="changeTopBarColor" data-color="green2"></button>
              <button type="button" class="changeTopBarColor" data-color="orange2"></button>
              <button type="button" class="changeTopBarColor" data-color="red2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Sidebar</h4>
            <div class="btnSwitch">
              <button type="button" class="selected changeSideBarColor" data-color="white"></button>
              <button type="button" class="changeSideBarColor" data-color="dark"></button>
              <button type="button" class="changeSideBarColor" data-color="dark2"></button>
            </div>
          </div>
          <div class="switch-block">
            <h4>Background</h4>
            <div class="btnSwitch">
              <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
              <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
              <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
              <button type="button" class="changeBackgroundColor" data-color="dark"></button>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-toggle">
        <i class="flaticon-settings"></i>
      </div>
    </div>
    <!-- End Custom template -->
  </div>




<div class="modal fade" id="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <center>
    
<div class="sk-chase">
  <div class="sk-chase-dot"></div>
  <div class="sk-chase-dot"></div>
  <div class="sk-chase-dot"></div>
  <div class="sk-chase-dot"></div>
  <div class="sk-chase-dot"></div>
  <div class="sk-chase-dot"></div>
</div>
  </center>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary save-btn">Save</button>
</div>
</div>
</div>
</div>
  <!--   Core JS Files   -->
  <script src="{{ url("/assets/js/core/jquery.3.2.1.min.js") }}"></script>
  <script src="{{ url("/assets/js/core/popper.min.js") }}"></script>
  <script src="{{ url("/assets/js/core/bootstrap.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/chart.js/chart.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js") }}"></script>
  <script src="{{ url("/assets/js/plugin/chart-circle/circles.min.js") }}"></script>
  <!-- <script src="{{ url("/assets/js/plugin/datatables/datatables.min.js") }}"></script> -->
  <!-- <script src="{{ url("/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js") }}"></script> -->
  <!-- <script src="{{ url("/assets/js/plugin/jqvmap/jquery.vmap.min.js") }}"></script> -->
  <!-- <script src="{{ url("/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js") }}"></script> -->
  <!-- <script src="{{ url("/assets/js/plugin/sweetalert/sweetalert.min.js") }}"></script> -->
  <script src="{{ url("/assets/js/atlantis.min.js") }}"></script>



<!-- Required -->
        <script src="{{ url("/src/datatables.net/js/jquery.dataTables.min.js") }}"></script>
  <script src="{{ url("/src/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>

  <script type="text/javascript" src="{{ url("/src/bootstrap-notify.min.js") }}"></script>
  <script src="{{ url("/src/sweetalert2/dist/sweetalert2.min.js") }}"></script> 
  
<script type="text/javascript" src="{{ url("/src/select2/dist/js/select2.min.js") }}"></script>
  <script type="text/javascript" src="{{ url("/src/crudify.min.js?time=".time()) }}"></script>
<script type="text/javascript" src="{{ url('assets/js/qrcode.min.js') }}"></script>

@stack("scripts")
<!-- Required -->
  <!-- Atlantis DEMO methods, don't include it in your project! -->
<!--  <script src="../assets/js/setting-demo.js"></script>
  <script src="../assets/js/demo.js"></script> -->
  <script>
    Circles.create({
      id:'circles-1',
      radius:45,
      value:60,
      maxValue:100,
      width:7,
      text: 5,
      colors:['#f1f1f1', '#FF9E27'],
      duration:400,
      wrpClass:'circles-wrp',
      textClass:'circles-text',
      styleWrapper:true,
      styleText:true
    })

    Circles.create({
      id:'circles-2',
      radius:45,
      value:70,
      maxValue:100,
      width:7,
      text: 36,
      colors:['#f1f1f1', '#2BB930'],
      duration:400,
      wrpClass:'circles-wrp',
      textClass:'circles-text',
      styleWrapper:true,
      styleText:true
    })

    Circles.create({
      id:'circles-3',
      radius:45,
      value:40,
      maxValue:100,
      width:7,
      text: 12,
      colors:['#f1f1f1', '#F25961'],
      duration:400,
      wrpClass:'circles-wrp',
      textClass:'circles-text',
      styleWrapper:true,
      styleText:true
    })

    var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

    var mytotalIncomeChart = new Chart(totalIncomeChart, {
      type: 'bar',
      data: {
        labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
        datasets : [{
          label: "Total Income",
          backgroundColor: '#ff9e27',
          borderColor: 'rgb(23, 125, 255)',
          data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        scales: {
          yAxes: [{
            ticks: {
              display: false //this will remove only the label
            },
            gridLines : {
              drawBorder: false,
              display : false
            }
          }],
          xAxes : [ {
            gridLines : {
              drawBorder: false,
              display : false
            }
          }]
        },
      }
    });

    $('#lineChart').sparkline([105,103,123,100,95,105,115], {
      type: 'line',
      height: '70',
      width: '100%',
      lineWidth: '2',
      lineColor: '#ffa534',
      fillColor: 'rgba(255, 165, 52, .14)'
    });

// window.Echo.channel('test-event')
//     .listen('ExampleEvent', (e) => {
//         console.log(e);
//     });




  </script>
  <script type="text/javascript">

        window.Laravel = {
            'csrfToken': '{{ csrf_token() }}',
            'user': '{{user()->id}}'
        };


        Echo.private('send-qr-event-{{user()->id}}')
      .listen('SendQr', (msg) => {
        // console.log(msg.key);
        console.log(msg);
        var qrcode = new QRCode(document.getElementById("qrcode"));
        qrcode.clear();

        qrcode.makeCode(msg.data);



        
        // var qrcode = new QRCode(document.getElementById("qrcode"), msg.data);
      });


        Echo.private('state-open-{{user()->id}}')
      .listen('StateOpen', (msg) => {
        // console.log(msg.key);
        // console.log(msg);
        // var qrcode = new QRCode(document.getElementById("qrcode"));
        // qrcode.clear();

        $(".wrap-"+msg.data).html('<div class="alert alert-success">Success,You will redirected a few seconds</div>');

        setTimeout(function(){
          location.reload();
        },5000);
        // qrcode.makeCode(msg.data);




        
        // var qrcode = new QRCode(document.getElementById("qrcode"), msg.data);
      });



Echo.private('on-message-{{user()->id}}').listen('OnMessage', function(e) {
    // console.log("Wena!, a "+e.data.user_name + " le ha gustado uno de tus aportes");
    // console.log(e);
    console.log("x");
    // console.log(e);
    load(e.data);

});


  </script>
  @stack('scripts2')
</body>
</html>