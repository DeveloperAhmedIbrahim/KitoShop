@extends('layout')
@section('title', 'Sizes')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Sizes Panel</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Size</li>
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
                            <h2 class="float-left">Edit Size - {{ $size->size }}</h2>
                            <a class="btn btn-secondary btn-round float-right" href="{{ url('product/size') }}">
                                <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back
                            </a>
                        </div>
                        <div class="body">
                            <form class="form" method="POST" id="sizes-form">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{ $size->id }}">
                                <input type="hidden" name="request_type" id="request_type" value="update">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="size">Size</label>
                                            <input name="size" id="size" type="text" value="{{ $size->size }}" class="form-control mt-1">
                                            <span class="size-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" id="btn-submit-size" class="btn btn-purple btn-round">
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
