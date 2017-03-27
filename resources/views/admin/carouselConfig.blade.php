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
                                <input maxlength="40" required id="c_title" name="c_title" type="text" class="form-control required" value="{{$carousel['name']}}" aria-required="true">
                            </div>
                            <div class="form-group">
                                <label>轮播位置 *</label>
                                <select id="c_type" name="c_type" class="form-control required" aria-required="true">
                                    <option {{$carousel['type'] == 1 ? 'selected = "true"' : ''}} value="1">首页轮播</option>
                                    <option {{$carousel['type'] == 2 ? 'selected = "true"' : ''}} value="2">其它轮播</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>发布 *</label>
                                <select id="c_status" name="c_status" class="form-control required" aria-required="true">

                                    <option {{$carousel['status'] == 1? 'selected = "true"' : ''}} value="1">投入使用</option>
                                    <option {{$carousel['status'] == 2? 'selected = "true"' : ''}} value="2">备用</option>
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="text-center">
                                <div style="margin-top: 20px;cursor: pointer;">
                                    <i id="submit" class="fa fa-sign-out fa-2x fa-spin" style="font-size: 1px;color: #e5e5e5 ">
                                        <img src="{{url('upload/carousel/').'/'.$carousel['url']}}" alt="">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>



                <!-- Upload image and data -->
                <div class="avatar-upload">

                </div>

                <!-- Crop and preview -->


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
    <script>



        //图片大小限制
        var maxSize = parseInt($("#imageSize").html())*1024*1024;

        //图片类型限制
        var allowType = ["image/jpeg","image/png"];

        //图片数据
        var c_file   = $("#avatarInput");
        var c_title  = $("#c_title");
        var c_status = $("#c_status");
        var c_type   = $("#c_type");

        var size,imageType;

        $("#submit").click(function () {

            console.log(c_file[0].files[0]);

            if(c_file[0].files[0] === undefined)
            {
                alert("请上传图片");
                return false;
            }

            size = parseInt(c_file[0].files[0].size);
            imageType = c_file[0].files[0].type;



            if(size>maxSize)
            {
                alert('图片过大');
                return false;
            }


            if($.inArray(imageType,allowType) === -1)
            {
                alert($("#allowTypes").html());
                return false;
            }

            if(c_title.val() ==='')
            {
                alert("请填写图片名");
                return false;
            }


            var formData = new FormData($("#myForm")[0]);


            $.ajax(
                {
                    url:"{{URL::action('AdminController@doCarouselConfig')}}",
                    data: formData,
                    type:"post",
                    dataType:"json",
                    processData: false,  // 告诉jQuery不要去处理发送的数据
                    contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
                    success:function (re) {

                        if(re.status)
                        {
                            alert(re.msg);
                            window.location.reload();
                        }
                        else
                        {
                            alert(re.msg);
                        }
                    },
                    fail:function () {
                        alert(1);
                        alert("系统异常");
                    }
                }
            );
        });

    </script>
@endsection