@extends('layouts.adminLayout')

@section('title','文章发布')

@include('layouts.side_bar')

@section('content')

    <link rel="stylesheet" href="{{asset('common/datatables/semantic.min.css')}}">
    <link rel="stylesheet" href="{{asset('common/datatables/dataTables.semanticui.min.css')}}">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">文章列表</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        高次幂序列dubStep魔法
                    </div>
                    <div class="panel-body">
                        <table id="example" class="ui celled table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>标题</th>
                                <th>摘要</th>
                                <th>状态</th>
                                <th>阅读量</th>
                                <th>发布时间</th>
                                <th>修改</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <!-- tbody是必须的 -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('common/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('common/datatables/dataTables.semanticui.min.js')}}"></script>
    <script src="{{asset('common/datatables/semantic.min.js')}}"></script>
    <script src="{{asset('js/admin/article.js')}}"></script>
@endsection