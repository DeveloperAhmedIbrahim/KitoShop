<?php
use App\Helper\Helper;
?>
@extends('layout')
@section('title','Vendors')
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
                    <li class="breadcrumb-item active">Vendor</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><a href="{{ url('purchase/vendor/new') }}"> <button  class="btn btn-secondary btn-round"> <i class="fa fa-plus"></i> New vendor</button></a></h2>
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
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($vendors); $i++)
                                        <tr>
                                            {{-- <td style="width: 50px;">
                                                <label class="fancy-checkbox">
                                                    <input class="checkbox-tick" type="checkbox" value="{{ $vendors[$i]->id }}" name="selected_colors">
                                                    <span></span>
                                                </label>
                                            </td> --}}
                                            <td>
                                                {{ $vendors[$i]->id }}
                                            </td>
                                            <td>
                                                {{ $vendors[$i]->name }}
                                            </td>
                                            <td>
                                                {{ $vendors[$i]->contact }}
                                            </td>
                                            <td>
                                                {{ $vendors[$i]->email }}
                                            </td>
                                            <td>
                                                <a  href="{{ url('purchase/vendor/edit') }}/{{ Helper::encrypt($vendors[$i]->id) }}" class="btn btn-info btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a  href="javascript:void(0)" onclick="confirm_delete('vendor','{{ url('purchase/vendor/delete') }}/{{ Helper::encrypt($vendors[$i]->id) }}')" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
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
