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
<h4>New Password</h4>
<br>

                            <form id="form" onsubmit="return false" method="POST" >
                                <div class="form-group">
                                    <label>New Password</label>

                                    <div class="input-group input-group--inline">
                                        <input type="password" class="form-control" name="password_confirmation" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Confirm New Password</label>

                                    <div class="input-group input-group--inline">
                                        <input type="password" class="form-control" name="password" value="">
                                    </div>
                                </div>
                               
                            <div class="text-center">
                               <button class="btn btn-primary" type="submit">Verify</button>
                            </div>
                            </form>
                        </div>
                    </div>
            


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