@extends('layouts.adminLayout')

@section('title','字幕组账号列表')

@include('layouts.side_bar')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">字幕组账号列表</h1>
            </div>
        </div>

        <hr style="color: transparent;border: transparent;">



        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>所有的字幕组账号...</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_foo_table.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_foo_table.html#">Config option 1</a>
                                </li>
                                <li><a href="table_foo_table.html#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {{ csrf_field() }}
                        <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded" data-page-size="8">
                            <thead>
                            <tr>
                                <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">字幕组名称<span class="footable-sort-indicator"></span></th>
                                <th class="footable-visible footable-sortable">账户名<span class="footable-sort-indicator"></span></th>
                                <th class="footable-visible footable-sortable">类型<span class="footable-sort-indicator"></span></th>
                                <th class="footable-visible footable-sortable">创建时间<span class="footable-sort-indicator"></span></th>
                                <th class="footable-visible footable-last-column footable-sortable">操作<span class="footable-sort-indicator"></span></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($items as $group)
                                <tr style="display: table-row;" class="footable-even">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>{{$subArr[$group['fansub_id']]}}</td>
                                    <td class="footable-visible">{{$group['user_name']}}</td>
                                    <td class="footable-visible">{{$group['character'] Or '未定义'}}</td>
                                    <td class="footable-visible">{{$group['updated_at']}}</td>
                                    <td class="footable-visible footable-last-column"><a href="updateSubTitleGroupAccount?id={{$group['id']}}">修改</a>|<a class="delete" value="{{$group['id']}}" href="#">删除</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" class="footable-visible">
                                    {!! $page !!}
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>


        $(".delete").bind('click',function (e) {

            e.preventDefault();

            if(!confirm('确认删除该字幕组账户？'))
                return false;


            $.ajax(
                {
                    url:rootPath+'/deleteSubTitleGroupAccount',
                    data: {id:$(this).attr('value'),_token:$('input[name="_token"]').val()},
                    type:"post",
                    dataType:"json",
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