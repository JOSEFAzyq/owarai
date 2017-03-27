/**
 * Created by Administrator on 2017/3/16 0016.
 */
$(function(){
    $('#example').DataTable( {
        //开启服务器模式
        serverSide: true,
        //数据来源（包括处理分页，排序，过滤） ，即url，action，接口，等等
        ajax:rootPath+'/article/list',
        columns: [
            { "data": "id" },
            { "data": "title" },
            { "data": "content" },
            { "data": "status" },
            { "data": "view" },
            { "data": "created_at" },
            {"data":function(){
                return 'abc';
            }}
        ]
    } );

});