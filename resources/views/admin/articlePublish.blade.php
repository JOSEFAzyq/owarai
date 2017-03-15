@extends('layouts.adminLayout')

@section('title','文章发布')

@include('layouts.side_bar')

@section('content')
    <script src="{{URL::asset('common/ckeditor/ckeditor.js')}}"></script>
        <div id="page-wrapper">
            <div class="row">
                <form class="">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon">请输入文章标题:</div>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-addon">请选择对应标签</div>
                            <select name="tag" id="" class="form-control">
                                <option value="">综艺</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                        This is my textarea to be replaced with CKEditor.
                    </textarea>
                    </div>
                </form>
            </div>
        </div>


    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection