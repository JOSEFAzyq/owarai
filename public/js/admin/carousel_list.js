var deleteItem = function (id) {

    $.ajax({
        url:rootPath+'/carouselDelete',
        data:{id:id},
        dataType:'post',
        success:function (re) {
            if(re.status)
                alert(re.msg);
            else
                alert(re.msg);
        }
    });
    window.location.reload();
};



$(function(){



    $('#example').DataTable( {
        deferRender:1000,
        //开启服务器模式
        serverSide: true,
        //数据来源（包括处理分页，排序，过滤） ，即url，action，接口，等等
        ajax:rootPath+'/doCarouselSelect',
        columns: [
            { "data": "name" },
            { "data": function (data) {
                return '<img style="height: 150px" src="'+data.url+'">';
            } },
            { "data": function (data) {
                if(data.status == 1)
                    return '使用中';
                else
                    return '未使用';
            } },
            { "data": "created_at" },
            {"data":function(data){

                return '<a style="text-decoration: none;color: black;" href="carouselConfig?id='+data.id+'">编辑</a>|<span onclick="deleteItem('+data.id+')" >删除</span>';
            }}
        ]
    } );





});