@extends('admin.layouts.main-layout')
@section('title','Add New Service')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container-fluid ">
            @include('alerts.index')
            <form action="{{ url('admin/services/addnewproduct') }}"  method="POST" id="productform" enctype="multipart/form-data" >
                    @csrf

            <div id="content" class="padding-20">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h4 class="text-primary" style="margin:0;"><strong> Enter Service Details</strong></h4>
                                    </div>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-12">
                                        <label><strong>Service Name <span class="text-danger">*</span></strong></label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter Service name" value="">
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Description</strong></label>
                                            <textarea class="form-control" rows="5" name="description"></textarea>
                                        </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                            <label><strong>Iage</strong></label>
                                            <input class="form-control" name="image" type="file">
                                         </div>
                                     </div>
                                 </div>
                            </div>
                            <div class="card-footer">
                                 <input type="submit" class="btn btn-success" value="Submit Changes"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form> <!-- /PANEL -->
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('public/admin/assets/js/sortable.js')}}"></script> 
@endsection