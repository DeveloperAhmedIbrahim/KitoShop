@extends('layout')
@section('title', 'Products')
@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Products Panel</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Product</li>
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
                            <h2 class="float-left">New Product</h2>
                            <a class="btn btn-secondary btn-round float-right" href="{{ url('product') }}">
                                <i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Go Back
                            </a>
                        </div>
                        <div class="body">
                            <form class="form" method="POST" id="products-form" enctype="multipart/form-data">
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
                                            <label for="article">Article</label>
                                            <input name="article" id="article" type="text" class="form-control mt-1">
                                            <span class="article-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="sizes">Sizes</label>
                                            <div class="multiselect_div">
                                                <select id="sizes" name="sizes[]" class="multiselect multiselect-custom" multiple="multiple">
                                                    @for ($i = 0; $i < count($sizes); $i++)
                                                        <option value="{{ $sizes[$i]->id }}">{{ $sizes[$i]->size }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <span class="sizes-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <label for="colors">Colors</label>
                                            <div class="multiselect_div">
                                                <select id="colors" name="colors[]" class="multiselect multiselect-custom" multiple="multiple">
                                                    @for ($i = 0; $i < count($colors); $i++)
                                                        <option value="{{ $colors[$i]->id }}">{{ $colors[$i]->name }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <span class="colors-error field-error">&nbsp;</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                                                <div class="form-group mt-1">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image" accept="image/*" onchange="load_product_image(event)" id="image">
                                                        <label class="custom-file-label" for="image">Upload image</label>
                                                    </div>
                                                    <span class="image-error field-error">&nbsp;</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
                                                <div class="container card" style="width: 100px; height: 100px">
                                                    <img  id="product-image-preview"  class="p-1 w-100" src="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="btn-submit-product" class="btn btn-purple btn-round">
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
