@extends('layouts.adminLayout')

@section('title','修改字幕组账号')

@include('layouts.side_bar')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">修改字幕组账号</h1>
            </div>
        </div>

        <hr style="color: transparent;border: transparent;">

        <div class="body">
            <form id="myForm" class="form-horizontal col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"  method="post">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="fansub_id" class="col-lg-3 control-label">字幕组选择</label>
                    <div class="col-lg-7">
                        <select name="fansub_id" id="fansub_id" class="form-control">
                            @foreach ($fanSubs as $fanSub)
                                <option value="{{$fanSub['id']}}">{{$fanSub['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{$item['id']}}">

                <div class="form-group">
                    <label for="username" class="col-lg-3 control-label">账号</label>
                    <div class="col-lg-7">
                        <input minlength="4" maxlength="20" type="text" class="form-control" name="username" value="{{$item['user_name']}}" id="username" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-lg-3 control-label">密码</label>
                    <div class="col-lg-7">
                        <input minlength="6" type="password" class="form-control" name="password" value="******" id="password" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm_password" class="col-lg-3 control-label">确认密码</label>
                    <div class="col-lg-7">
                        <input minlength="6" type="password" class="form-control" name="confirm_password" value="******" id="confirm_password" >
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-4 col-lg-8">
                        <button type="submit" id="submit" class="btn btn-primary">提交</button>
                        <button type="button" id="return" class="btn btn-warning">主页</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script>

        $("#return").bind('click',function () {
            window.location.href = rootPath + '/index';
        });

        $("#submit").bind('click',function (e) {

            e.preventDefault();

            var formData = new FormData($("#myForm")[0]);

            $.ajax(
                {
                    url:rootPath+'/doUpdateSubTitleGroupAccount',
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
                        alert("系统异常");
                    }
                }
            );
        });


    </script>
@endsection