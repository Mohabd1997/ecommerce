@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('admin/general.home')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="">{{__('admin/settings.settings')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{__('admin/settings.shipping methods')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">{{__('admin/settings.edit').' '.__('admin/settings.shipping method')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.dashboard.update.shipping.methods',$shipping_method->id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf

                                             <input type="hidden" name="id" value="{{$shipping_method->id}}">
                                            <div class="form-body">

                                                <!-- <h4 class="form-section"><i class="ft-home"></i> ???????????? ???????????? </h4> -->


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{__('admin/settings.name')}} </label>
                                                            <input type="text" value="{{$shipping_method->translations[0]->value}}" id="value"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="value">
                                                            @error("value")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">{{__('admin/settings.shipping value')}}</label>
                                                            <input type="number" id="plain_value"
                                                                   class="form-control"
                                                                   placeholder="  " name="plain_value"
                                                              value="{{$shipping_method->plain_value}}">

                                                            @error("plain_value")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
<!--                                              
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1" id="switcheryColor4"
                                                                   class="switchery"
                                                                   data-color = "success"
                                                                   name="active"
                                                                   checked/>
                                                            <label for="projectinput1"> {{__('admin/settings.status')}} </label>
                                                            @error("status")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>    -->
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> {{__('admin/general.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> {{__('admin/general.save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    @stop