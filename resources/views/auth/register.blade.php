@extends('auth.auth')
@section('title')
<title>Pesan.digital - Register</title>
    {{-- expr --}}
@endsection
@section('content')
	{{-- expr --}}
	   <div class="col-md-5 mt-5" style="float: none;margin: 0 auto;">
                         <div class="card">

                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Register</div>
                                    
                                    </div>
                                </div>
                        <div class="card-body" >
                            <div class="result">
                                
                            </div>
                            <form id="form" onsubmit="return false" method="POST" >
                           
                           <div class="form-group">
                                    <label>First Name</label>
                                    <div class="input-group input-group--inline">
                                      
                                        <input type="text" class="form-control" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <div class="input-group input-group--inline">
                                        <input type="text" class="form-control" name="lastname">
                                    </div>
                                </div>


                            <div class="form-group left-icon">
                                <label>Email</label>
                                <div class="input-group input-group--inline">
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="form-group left-icon">
                                <label>Password</label>
                                <div class="input-group input-group--inline">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group left-icon">
                                <label>Password Confirmation</label>
                                <div class="input-group input-group--inline">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="text-center">
                               <button class="btn btn-primary" type="submit">SIGN UP</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

 <div class="d-flex justify-content-center">
                    <span class="mr-2 text-white">Already have an account?</span>
                    <a href="{{ url('login') }}">Login</a>
                </div>


@endsection