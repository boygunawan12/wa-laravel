@extends('auth.auth')
@section('content')
    {{-- expr --}}
            <div class="row w-100 justify-content-center" >
                         <div class="card card-login mb-3 card-width"  >
                        <div class="card-body" style="height: 300px;">
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
<h4>Forgot Password</h4>
<br>

                            <form id="form" onsubmit="return false" method="POST" >
                                <div class="form-group">
                                    <label>Email</label>

                                    <div class="input-group input-group--inline">
                                        <input type="text" class="form-control" name="email" >
                                    </div>
                                </div>
                               
                            <div class="text-center">
                               <button class="btn btn-primary" type="submit">Verify</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

 <div class="d-flex justify-content-center">
                    <span class="mr-2">Don't have an account?</span>
                    <a href="{{ url('register') }}">Sign Up</a>
                </div>
                    <br>
                    <a href="{{ url('forgot-password') }}">I forgot the password</a>



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