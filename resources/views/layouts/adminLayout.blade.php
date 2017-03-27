<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>保护李奶奶 - @yield('title')</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('css/common/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('css/common/metisMenu.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/admin/pages.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('common/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
        <![endif]-->


        <!-- jQuery -->
        <script src="{{ URL::asset('js/common/jquery.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('js/common/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('js/common/metisMenu.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('js/admin/sb-admin-2.js') }}"></script>

        <script>
            var rootPath='{{ url('admin') }}';
        </script>

        <!-- Morris Charts JavaScript -->
        {{--<script src="{{ URL::asset('js/common/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('js/common/morris.min.js') }}"></script>
        <script src="{{ URL::asset('js/common/morris-data.js') }}"></script>--}}

    </head>
    <body>

    <!--模板页面-->
     @yield('content')

    </body>

</html>
