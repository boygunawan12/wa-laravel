
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">User</h4>
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
                                <a href="#">user</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">User Total</p>
                                                <h4 class="card-title">{{$totalUser}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">


                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">device</h4>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                  <button data-title="Create Data" data-src="{{ url('users/create') }}" class="btn btn-primary create-btn">Create</button>


                  
         
               <table class="table table-striped" id="table">
  <thead>
     <th>Email</th>
     <th>Created At</th>
     <th>Status</th>
     <th>Quota Left</th>

  
  
    <th>Options</th>
  </thead>

  <tbody>
  </tbody>
</table>
                </div>






                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





                @endsection


@push('scripts')
<script>

$(function() {
    $('#table').DataTable({
        processing: true,
            order: [ [1, 'desc'] ],
        serverSide: true,
        ajax: '{!! route("users.json") !!}',
        columns: [
         {data:'email',name:'users.email'},
         {data:'created_at',name:'users.created_at'},
         {data:'is_active',name:'users.is_active'},
         {data:'quota',name:'quota'},
{data:'action',name:'action'}
     
        ]
    });
});





</script>
@endpush


