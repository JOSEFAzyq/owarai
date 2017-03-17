@extends('layouts.adminLayout')

@section('title','文章发布')

@include('layouts.side_bar')

@section('content')

    <link rel="stylesheet" href="{{asset('common/datatables/dataTables.bootstrap.css')}}">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">文章列表</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DataTables Advanced Tables
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
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
    <script src="{{asset('common/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/article.js')}}"></script>
    <script>

    </script>
@endsection