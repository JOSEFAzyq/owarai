/**
 * Created by Administrator on 2017/3/16 0016.
 */
$(function(){
   /* var t = $('#example').DataTable({
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
    });*/
    var dataSet = [
        ['Trident','Internet Explorer 4.0','Win 95+','4','X'],
        ['Trident','Internet Explorer 5.0','Win 95+','5','C'],
        ['Trident','Internet Explorer 5.5','Win 95+','5.5','A'],
        ['Trident','Internet Explorer 6','Win 98+','6','A'],
        ['Trident','Internet Explorer 7','Win XP SP2+','7','A'],
        ['Trident','AOL browser (AOL desktop)','Win XP','6','A'],
        ['Gecko','Firefox 1.0','Win 98+ / OSX.2+','1.7','A'],
        ['Gecko','Firefox 1.5','Win 98+ / OSX.2+','1.8','A'],
        ['Gecko','Firefox 2.0','Win 98+ / OSX.2+','1.8','A'],
        ['Gecko','Firefox 3.0','Win 2k+ / OSX.3+','1.9','A'],
        ['Gecko','Camino 1.0','OSX.2+','1.8','A'],
        ['Gecko','Camino 1.5','OSX.3+','1.8','A'],
        ['Gecko','Netscape 7.2','Win 95+ / Mac OS 8.6-9.2','1.7','A'],
        ['Gecko','Netscape Browser 8','Win 98SE+','1.7','A'],
        ['Gecko','Netscape Navigator 9','Win 98+ / OSX.2+','1.8','A'],
        ['Gecko','Mozilla 1.0','Win 95+ / OSX.1+',1,'A'],
        ['Gecko','Mozilla 1.1','Win 95+ / OSX.1+',1.1,'A'],
        ['Gecko','Mozilla 1.2','Win 95+ / OSX.1+',1.2,'A'],
        ['Gecko','Mozilla 1.3','Win 95+ / OSX.1+',1.3,'A'],
        ['Gecko','Mozilla 1.4','Win 95+ / OSX.1+',1.4,'A'],
        ['Gecko','Mozilla 1.5','Win 95+ / OSX.1+',1.5,'A'],
        ['Gecko','Mozilla 1.6','Win 95+ / OSX.1+',1.6,'A'],
        ['Gecko','Mozilla 1.7','Win 98+ / OSX.1+',1.7,'A'],
        ['Gecko','Mozilla 1.8','Win 98+ / OSX.1+',1.8,'A'],
        ['Gecko','Seamonkey 1.1','Win 98+ / OSX.2+','1.8','A'],
        ['Gecko','Epiphany 2.20','Gnome','1.8','A'],
        ['Webkit','Safari 1.2','OSX.3','125.5','A'],
        ['Webkit','Safari 1.3','OSX.3','312.8','A'],
        ['Webkit','Safari 2.0','OSX.4+','419.3','A'],
        ['Webkit','Safari 3.0','OSX.4+','522.1','A'],
        ['Webkit','OmniWeb 5.5','OSX.4+','420','A'],
        ['Webkit','iPod Touch / iPhone','iPod','420.1','A'],
        ['Webkit','S60','S60','413','A'],
        ['Presto','Opera 7.0','Win 95+ / OSX.1+','-','A'],
        ['Presto','Opera 7.5','Win 95+ / OSX.2+','-','A'],
        ['Presto','Opera 8.0','Win 95+ / OSX.2+','-','A'],
        ['Presto','Opera 8.5','Win 95+ / OSX.2+','-','A'],
        ['Presto','Opera 9.0','Win 95+ / OSX.3+','-','A'],
        ['Presto','Opera 9.2','Win 88+ / OSX.3+','-','A'],
        ['Presto','Opera 9.5','Win 88+ / OSX.3+','-','A'],
        ['Presto','Opera for Wii','Wii','-','A'],
        ['Presto','Nokia N800','N800','-','A'],
        ['Presto','Nintendo DS browser','Nintendo DS','8.5','C/A<sup>1</sup>'],
        ['KHTML','Konqureror 3.1','KDE 3.1','3.1','C'],
        ['KHTML','Konqureror 3.3','KDE 3.3','3.3','A'],
        ['KHTML','Konqureror 3.5','KDE 3.5','3.5','A'],
        ['Tasman','Internet Explorer 4.5','Mac OS 8-9','-','X'],
        ['Tasman','Internet Explorer 5.1','Mac OS 7.6-9','1','C'],
        ['Tasman','Internet Explorer 5.2','Mac OS 8-X','1','C'],
        ['Misc','NetFront 3.1','Embedded devices','-','C'],
        ['Misc','NetFront 3.4','Embedded devices','-','A'],
        ['Misc','Dillo 0.8','Embedded devices','-','X'],
        ['Misc','Links','Text only','-','X'],
        ['Misc','Lynx','Text only','-','X'],
        ['Misc','IE Mobile','Windows Mobile 6','-','C'],
        ['Misc','PSP browser','PSP','-','C'],
        ['Other browsers','All others','-','-','U']
    ];

    $(document).ready(function() {
        $('#demo').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );

        $('#example').dataTable( {
            "data": dataSet,
            "columns": [
                { "title": "Engine" },
                { "title": "Browser" },
                { "title": "Platform" },
                { "title": "Version", "class": "center" },
                { "title": "Grade", "class": "center" }
            ]
        } );
    } );
})