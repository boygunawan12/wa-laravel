@extends('auth.auth')
@section('title')
<title>Pesan.digital - Login</title>

    {{-- expr --}}
@endsection
@section('content')
    {{-- expr --}}
    <div class="col-md-5 mt-5" style="float: none;margin: 0 auto;">
                         <div class="card">

                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Login</div>
                                    
                                    </div>
                                </div>
                        <div class="card-body" >
                            <div class="result">
                                
                            </div>
                            @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
@if (session('warning'))
  <div class="alert alert-warning">
    {{ session('warning') }}
  </div>
@endif


                            <form id="form" onsubmit="return false" method="POST" >
                                <div class="form-group">
                                    <label>Email</label>

                                    <div class="input-group input-group--inline">
                                        <input type="text" class="form-control" name="email" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label>Password</label>
{{--                                         <span class="ml-auto"><a href="forgot-password.html">Forgot password?</a></span>
 --}}                                    </div>

                                    <div class="input-group input-group--inline">
                                        <input type="password" class="form-control" name="password" >
                                    </div>
                                </div>
                               
                            <div class="text-center">
                               <button class="btn btn-primary btn-block" type="submit">LOGIN</button>
                            </div>
                            <br>
                            <br><br>
                            </form>
                        </div>
                    </div>
                </div>

 <div class="d-flex justify-content-center">
                    <span class="mr-2 text-white">Don't have an account?</span>
                    <b><a class="text-white" href="{{ url('register') }}">Sign Up</a></b>
                </div>
                    <br>
                    



                <style type="text/css">
                    @media(min-width: 1281px){
                        .card-width{
                        width: 40% !important;
                    }

                    }
                    .padding-minimalize{
                        padding-top: 0 !important;
                    }
                </style>
@endsection