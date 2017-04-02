var c_title = $("#c_title");
var c_status = $("#c_status");
var order = $("#order");

$("#submit").click(function () {

    if(c_status.val() == 1 && order.val() == 0)
    {
        alert('请为发布的图片选择排序');
        return;
    }


    if(c_title.val() ==='')
    {
        alert("请填写图片名");
        return false;
    }

    var formData = new FormData($("#myForm")[0]);

    $.ajax(
        {
            url:rootPath+'/doCarouselConfig',
            data: formData,
            type:"post",
            dataType:"json",
            processData: false,  // 告诉jQuery不要去处理发送的数据
            contentType: false,   // 告诉jQuery不要去设置Content-Type请求头
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
                alert(1);
                alert("系统异常");
            }
        }
    );
});