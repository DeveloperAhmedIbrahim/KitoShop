@extends('layout')
@section('title', 'Vendors')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Vendors Panel</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Vendor</li>
                        <li class="breadcrumb-item active">New</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="float-left">New Vendor</h2>
                            <a class="btn btn-secondary btn-round float-right" href="{{ url('purchase/vendor') }}">
                                <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back
                            </a>
                        </div>
                        <div class="body">
                            <form class="form" method="POST" id="vendors-form">
                                @csrf
                                <input type="hidden" name="request_type" id="request_type" value="insert">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="name">Name</label>
                                            <input name="name" id="name" type="text" class="form-control mt-1">
                                            <span class="name-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="email">Email</label>
                                            <input name="email" id="email" type="text" class="form-control mt-1">
                                            <span class="email-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="contact">Contact</label>
                                            <input name="contact" id="contact" type="text" class="form-control mt-1">
                                            <span class="contact-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="address">Address</label>
                                            <input name="address" id="address" type="text" class="form-control mt-1">
                                            <span class="address-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" id="btn-submit-vendor" class="btn btn-purple btn-round">
                                    <i class="far fa-check-circle"></i>&nbsp;&nbsp;Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
