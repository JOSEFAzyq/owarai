@extends('layouts.adminLayout')

@section('title','文章发布')

@include('layouts.side_bar')

@section('content')
    <script src="{{URL::asset('common/ckeditor/ckeditor.js')}}"></script>
    <div class="container">
        <div class="row">
            <form class="">
                <div class="input-group">
                    <div class="input-group-addon">选择对应板块</div>
                    <select name="" id="" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    This is my textarea to be replaced with CKEditor.
                </textarea>
            </form>
        </div>
    </div>


    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection