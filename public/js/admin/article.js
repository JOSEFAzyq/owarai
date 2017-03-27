/**
 * Created by Administrator on 2017/3/16 0016.
 */
$(function(){

    //数据渲染
    $('#example').DataTable( {
        deferRender:1000,
        //开启服务器模式
        serverSide: true,
        //数据来源（包括处理分页，排序，过滤） ，即url，action，接口，等等
        ajax:rootPath+'/article/list',
        columns: [
            { "data": "id" },
            { "data": "title" },
            { "data": "content" },
            { "data": function(data){
                var status=data['status'];
                var text='';
                if(status===0){
                    text='删除';
                }else if(status===1){
                    text='正常';
                }else if(status===2){
                    text='隐藏';
                }
                return text;

            }},
            { "data": "view" },
            { "data": "created_at" },
            {"data":function(){
                return '编辑';
            }}
        ],

    } );

});