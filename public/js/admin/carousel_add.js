//图片大小限制
var maxSize = parseInt($("#imageSize").html())*1024*1024;

//图片类型限制
var allowType = ["image/jpeg","image/png"];

//图片数据
var c_file   = $("#avatarInput");
var c_title  = $("#c_title");
var c_status = $("#c_status");
var c_type   = $("#c_type");

var size,imageType;

$("#submit").click(function () {

    console.log(c_file[0].files[0]);

    if(c_file[0].files[0] === undefined)
    {
        alert("请上传图片");
        return false;
    }

    size = parseInt(c_file[0].files[0].size);
    imageType = c_file[0].files[0].type;



    if(size>maxSize)
    {
        alert('图片过大');
        return false;
    }


    if($.inArray(imageType,allowType) === -1)
    {
        alert($("#allowTypes").html());
        return false;
    }

    if(c_title.val() ==='')
    {
        alert("请填写图片名");
        return false;
    }


    var formData = new FormData($("#myForm")[0]);


    $.ajax(
        {
            url:rootPath+'/doCarouselAdd',
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
                alert("系统异常");
            }
        }
    );
});