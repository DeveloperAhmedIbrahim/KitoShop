<?php
use App\Helper\Helper;
?>
@extends('layout')
@section('title','Colors')
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
                    <li class="breadcrumb-item active">Color</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><a href="{{ url('product/color/new') }}"> <button  class="btn btn-secondary btn-round"> <i class="fa fa-plus"></i> New Color</button></a></h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            {{-- <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Trash</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive check-all-parent">
                            <table class="table table-hover m-b-0 c_list">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <label class="fancy-checkbox">
                                                <input class="check-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </th> --}}
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Color</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($colors); $i++)
                                        <tr>
                                            {{-- <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" value="{{ $colors[$i]->id }}" name="selected_colors">
                                                    <span></span>
                                                </label>
                                            </td> --}}
                                            <td>
                                                {{ $colors[$i]->id }}
                                            </td>
                                            <td>
                                                {{ $colors[$i]->name }}
                                            </td>
                                            <td>
                                                <div class="float-left" style="width:20px;height:20px;background-color:{{ $colors[$i]->color }}; "></div>
                                                <span class="ml-1">{{ $colors[$i]->color }}</span>
                                            </td>
                                            <td>
                                                <a  href="{{ url('product/color/edit') }}/{{ Helper::encrypt($colors[$i]->id) }}" class="btn btn-info btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a  href="javascript:void(0)" onclick="confirm_delete('color','{{ url('product/color/delete') }}/{{ Helper::encrypt($colors[$i]->id) }}')" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endfor
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
