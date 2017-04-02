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

                <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="content" aria-hidden="false">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    轮播内容添加的tips
                                </div>
                                <div class="panel-body">
                                    <p id="allowTypes">轮播图别加太多了</p>
                                </div>
                                {{--<div class="panel-footer">
                                    Panel Footer
                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="hidden" name="c_id" value="{{$carousel['id']}}">
                            <div class="form-group">
                                <label>轮播图片名称 *</label>
                                <input maxlength="40" required id="c_title" name="c_title" type="text" class="form-control required" value="{{$carousel['name']}}" aria-required="true">
                            </div>

                            <div class="form-group">
                                <label>发布 *</label>
                                <select id="c_status" name="c_status" class="form-control required" aria-required="true">

                                    <option {{$carousel['status'] == 1? 'selected = "true"' : ''}} value="1">投入使用</option>
                                    <option {{$carousel['status'] == 2? 'selected = "true"' : ''}} value="2">备用</option>
                                </select>
                                <input type="hidden" name="pre_c_status" value="{{$carousel['status']}}">
                            </div>

                            <div class="form-group">
                                <label>排序 </label>
                                <input type="text" name="order" class="form-control" value="{{$carousel['order']}}">
                                <input type="hidden" name="pre_order" class="form-control" value="{{$carousel['order']}}">

                            </div>

                            <div class="form-group">
                                <label>已有轮播图片数量</label>
                                <input readonly type="text" name="max_number" class="form-control" value="{{$carousel['exist']}}">
                            </div>

                            <div class="form-group">
                                <img class="img-responsive" src="{{url('upload/carousel/').'/'.$carousel['url']}}" alt="">
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <div style="margin-top: 20px;cursor: pointer;">
                                    <i id="submit" class="fa fa-sign-out fa-2x fa-spin" style="font-size: 180px;color: #e5e5e5 ">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <!-- Loading state -->
            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
        </div>
    </div>

    <script src="{{ URL::asset('js/admin/carousel_config.js') }}"></script>
@endsection