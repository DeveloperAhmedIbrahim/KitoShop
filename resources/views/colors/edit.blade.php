@extends('layout')
@section('title', 'Colors')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Colors Panel</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Color</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="float-left">Edit Color - {{ $color->name }}</h2>
                            <a class="btn btn-secondary btn-round float-right" href="{{ url('product/color') }}">
                                <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back
                            </a>
                        </div>
                        <div class="body">
                            <form class="form" method="POST" id="colors-form">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $color->id }}">
                                <input type="hidden" name="request_type" id="request_type" value="update">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="name">Name</label>
                                            <input name="name" id="name" type="text" value="{{ $color->name }}" class="form-control mt-1">
                                            <span class="name-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="color" class="ml-1">Color</label>
                                            <div class="input-group colorpicker">
                                                <input id="color" name="color" type="text" class="form-control" value="{{ $color->color }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><span class="input-group-addon"><i></i></span></span>
                                                </div>
                                            </div>
                                            <span class="color-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" id="btn-submit-color" class="btn btn-purple btn-round">
                                    <i class="far fa-check-circle"></i>&nbsp;&nbsp;Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
