@extends('layouts.adminLayout')

@section('title','文章发布')

@include('layouts.side_bar')

@section('content')
    <script src="{{URL::asset('common/ckeditor/ckeditor.js')}}"></script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">文章编辑</h1>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            文章发布的tips
                        </div>
                        <div class="panel-body">
                            <p>自定义标签如果要写多个的话请用逗号分隔,就是这行话中的逗号,不要用中文逗号哦.发布首页的话,填写的数值越大越靠前.</p>
                        </div>
                        {{--<div class="panel-footer">
                            Panel Footer
                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <form class="" action="{{URL::action('AdminController@articleHandle')}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-lg-12">
                        <div class="input-group">
                            <div class="input-group-addon">请输入文章标题:</div>
                            <input type="text" class="form-control" name="title" id="title" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="input-group">
                            <div class="input-group-addon">请选择对应标签:</div>
                            <select name="tag_id" id="" class="form-control">
                                <option value="10">综艺</option>
                                <option value="11">段子</option>
                                <option value="12">番组</option>
                                <option value="13">讨论</option>
                                <option value="14">话题</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <div class="input-group-addon">自定义标签</div>
                            <input type="text" class="form-control" id="tags" name="custom_tags" placeholder="可用逗号分隔">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" aria-label="..." id="is_home" name="is_home">
                            </span>
                            <input type="text" class="form-control" placeholder="优先级,数值越大越靠前" maxlength="3" disabled id="ranked" name="ranked">
                            <span class="input-group-btn">
                                <label class="btn btn-info" for='is_home' type="button">发布到首页</label>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <textarea name="content" id="content" rows="10" cols="80" required>
                        This is special customize for OwaraiClub made by @Josefa
                    </textarea>
                    </div>
                    <div class="col-lg-3 col-lg-offset-9">
                        <div class="input-group">
                            <div class="input-group-addon">署名</div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="发表人" name="author">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">发表文章</button>
                            </span>
                        </div>
                    </div>
                    <div class="">
                    </div>
                </form>
            </div>
        </div>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
    <script>
        window.onload=function(){
            $('#is_home').on('click',function(){
                if($('#is_home').is(':checked')){
                    $('#ranked').attr('disabled',false);
                }else{
                    $('#ranked').attr('disabled',true);
                }
            })
        }

    </script>
@endsection