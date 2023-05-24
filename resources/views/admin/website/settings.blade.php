@extends('admin.layouts.main-layout')
@section('title','Website Settings')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            @include('alerts.index')
            <div class="row">
        <div class="col-md-4">

            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample3">
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <div class="card-title" style=" background-color: white; " data-toggle="collapse" data-target="#collapseOne3">
                            General Settings
                        </div>
                    </div>
                    <div id="collapseOne3" class="collapse show" data-parent="#accordionExample3">
                        <div class="card-body">
                            <form action="{{ url('admin/website/settingsupdate') }}" enctype='multipart/form-data' method="POST">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Website Name</label>
                                    <div class="col-md-8">
                                        
                                        <input type="text" name="website_name" class="form-control" placeholder="Website Name" value="{{$settings->site_name}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Emal</label>
                                    <div class="col-md-8">
                                        <input type="text" name="site_email" class="form-control"  value="{{$settings->site_email}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site phone number</label>
                                    <div class="col-md-8">
                                        <input type="text" name="site_phonenumber" class="form-control"  value="{{$settings->site_phonenumber}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Background Color</label>
                                    <div class="col-md-8">
                                        <input type="color" name="site_basecolor" class="form-control"  value="{{$settings->site_basecolor}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Address</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="site_address">{{$settings->site_address}}</textarea>
                                    </div>
                                </div>
                                


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo3">
                        <div style=" background-color: white; " class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo3">
                            Logos and Fav Icons
                        </div>
                    </div>
                    <div id="collapseTwo3" class="collapse" data-parent="#accordionExample3">
                        <div class="card-body">
                            <form action="{{ url('admin/website/updatelogos') }}" enctype='multipart/form-data' method="POST">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Header Logo</label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="header_logo">
                                            <input type="file" class="form-control" name="header_logo">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Footer Logo</label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="footer_logo">
                                            <input type="file" class="form-control" name="footer_logo">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Site Fav Icon</label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="favicon">
                                            <input type="file" class="form-control" name="favicon">
                                        </div>
                                        <br>
                                        <small class="text-muted">Website favicon. 32x32 .png</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Company Profile</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="file" name="company_profile">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne3">
                        <div class="card-title" style=" background-color: white; " data-toggle="collapse" data-target="#collapseOne4">
                            Social Media Links
                        </div>
                    </div>
                    <div id="collapseOne4" class="collapse" data-parent="#accordionExample3">
                        <div class="card-body">
                            <form action="{{ url('admin/website/settingsupdate') }}" enctype='multipart/form-data' method="POST">
                               @csrf
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Facebook</label>
                                    <div class="col-md-8">
                                        <input type="text" name="facebook" class="form-control" placeholder="Website Name" value="{{$settings->facebook}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Twitter</label>
                                    <div class="col-md-8">
                                        <input type="text" name="twitter" class="form-control"  value="{{$settings->twitter}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Instagram</label>
                                    <div class="col-md-8">
                                        <input type="text" name="instagram" class="form-control"  value="{{$settings->instagram}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Linkdlin</label>
                                    <div class="col-md-8">
                                        <input type="text" name="linkdlin" class="form-control"  value="{{$settings->linkdlin}}" />
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- end col-->
        <div class="col-md-8">
            <iframe src="{{ url('') }}"  height="800px" width="100%" title="Iframe Example"></iframe>
        </div>
    </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection