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
                                <th>序号</th>
                                <th>标题</th>
                                <th>摘要</th>
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
    <script>
        $(function(){
            var t = $('#example').DataTable({
                ajax: {
                    //指定数据源
                    url: "http://www.gbtags.com/gb/networks/uploads/a7bdea3c-feaf-4bb5-a3bd-f6184c19ec09/data.txt"
                },
                //每页显示三条数据
                pageLength: 3,
                columns: [{
                    "data": null //此列不绑定数据源，用来显示序号
                },
                    {
                        "data": "id"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "url"
                    }],
                "columnDefs": [{
                    // "visible": false,
                    //"targets": 0
                },
                    {
                        "render": function(data, type, row, meta) {
                            //渲染 把数据源中的标题和url组成超链接
                            return '<a href="' + data + '" target="_blank">' + row.title + '</a>';
                        },
                        //指定是第三列
                        "targets": 2
                    }]

            });

//前台添加序号
            t.on('order.dt search.dt',
                function() {
                    t.column(0, {
                        "search": 'applied',
                        "order": 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();

//更换数据源（相同格式，但是数据内容不同）
            $("#redraw").click(function() {
                var url = table.api().ajax.url("http://www.gbtags.com/gb/networks/uploads/a7bdea3c-feaf-4bb5-a3bd-f6184c19ec09/newData.txt");
                url.load();
            });
        })
    </script>
@endsection