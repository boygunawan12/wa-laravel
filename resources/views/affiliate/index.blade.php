
@extends('index')
@section('title')
<h1>{{@$title}}</h1>
@endsection

@section('content')



<div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Affiliates</h4>
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
                                <a href="#">affiliates</a>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="row">


                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Affiliate</h4>
                                </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                  <button data-title="Create Data" data-src="{{ url('affiliates/create') }}" class="btn btn-primary create-btn">Create</button>


                  
         
               <table class="table table-striped" id="table">
  <thead>
     <th>Username</th>
     <th>Created At</th>

  
  
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
        ajax: '{!! route("affiliates.json") !!}',
        columns: [
         {data:'username',name:'affiliate.username'},
         {data:'created_at',name:'affiliate.created_at'},
{data:'action',name:'action'}
     
        ]
    });
});





</script>
@endpush


