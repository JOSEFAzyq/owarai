@extends('layouts.adminLayout')

@section('title','添加轮播图')

@include('layouts.side_bar')

@section('content')

    <link href="{{ URL::asset('css/common/crop/cropper.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/common/crop/main.css') }}" rel="stylesheet">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">轮播内容添加</h1>
            </div>

        </div>





        <div class="container col-lg-12 col-md-12 col-sm-12  col-xs-12" id="crop-avatar">
            <form  id="myForm" class="avatar-form" action="{{URL::action('AdminController@doCarouselAdd')}}" enctype="multipart/form-data" method="post">


                <!-- Cropping modal -->


                {{ csrf_field() }}

                <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="content body current" aria-hidden="false">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    轮播内容添加的tips
                                </div>
                                <div class="panel-body">
                                    <p>上传图片不要太大了，目前限制为：<span id="imageSize">2</span>M； </p>
                                    <p id="allowTypes">目前只支持jpg,jpeg,png格式；</p>
                                </div>
                                {{--<div class="panel-footer">
                                    Panel Footer
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>轮播图片名称 *</label>
                                <input autocomplete="false"  maxlength="40" required id="c_title" name="c_title" type="text" class="form-control required" aria-required="true" value="">
                            </div>

                            <div class="form-group">
                                <label>图片宽度 *</label>
                                <input maxlength="5" required id="width" name="c_width" type="number" class="col-lg-3 form-control required" value="400" >
                            </div>

                            <div class="form-group">
                                <label>图片高度 *</label>
                                <input maxlength="5" required id="height" name="c_height" type="number" class="col-lg-3 form-control required" value="300" >
                            </div>

                            <input type="hidden" id="aspect_ratio">

                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <div style="margin-top: 20px;cursor: pointer;">
                                    <i id="submit" class="fa fa-sign-out fa-2x fa-spin" style="font-size: 180px;color: #e5e5e5 "></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload image and data -->
                    <div class="avatar-upload">
                        <input class="avatar-src" name="avatar_src" type="hidden">
                        <input class="avatar-data" name="avatar_data" type="hidden">
                        <label for="avatarInput">图片上传</label>
                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                    </div>

                    <!-- Crop and preview -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="avatar-wrapper"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="avatar-preview preview-lg"></div>

                        </div>
                    </div>

                    <div class="row avatar-btns">
                        <div class="col-md-9">
                            <div class="btn-group">
                                <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                            </div>
                        </div>

                    </div>

                </fieldset>
                <!-- <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                </div> -->

            </form>
            <!-- Loading state -->
            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
        </div>

    </div>
    <script src="{{ URL::asset('js/common/crop/cropper.min.js') }}"></script>
    <script src="{{ URL::asset('js/common/crop/main.js') }}"></script>
    <script src="{{ URL::asset('js/admin/carousel_add.js') }}"></script>

@endsection