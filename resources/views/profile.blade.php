
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Profile</h4>
                      
                    </div>
                    <div class="row">


                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Profile</h4>
                                </div>
                                <div class="card-body">
                                  
<div class="content">
                <div class="page-inner">
              <div class="col-lg-12">
                  <table class="table table-borderless">
                      <tr>
                          <td>Email</td><td>{{user()->email}}</td>
                      </tr>

                      <tr>
                          <td>Token</td><td>{{user()->token}}</td>
                      </tr>

                      <tr>
                          <td>Quota Left</td><td>{{user()->token}}</td>
                      </tr>
                  </table>
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
