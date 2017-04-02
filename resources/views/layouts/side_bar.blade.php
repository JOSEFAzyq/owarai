<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="index.html">SB Admin v2.0</a>

        <a class="navbar-brand" href="{{URL::action('AdminController@index')}}">笑神后台</a>

    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> 用户信息</a>

                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> 设置</a>

                </li>
                <li class="divider"></li>

                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> 登出</a>

                <li><a href="{{URL::action('AdminController@logOut')}}"><i class="fa fa-sign-out fa-fw"></i> 登出</a>

                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="功能待完善...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                </li>
                {{--后台首页--}}
                <li>
                    <a href="{{URL::action('AdminController@index')}}"><i class="fa fa-dashboard fa-fw"></i> 仪表盘</a>
                </li>
                {{--文章管理--}}
                <li>
                    <a href="#"><i class="fa fa-file-text fa-fw"></i> 文章管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::action('AdminController@articleList')}}">文章列表</a>
                        </li>
                        <li>
                            <a href="{{URL::action('AdminController@articlePublish')}}">文章发布</a>
                        </li>
                    </ul>
                </li>
                {{--资讯管理--}}
                <li>
                    <a href="#"><i class="fa fa-dot-circle-o fa-fw"></i> 资讯管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>

                            <a href="{{URL::action('AdminController@carouselSelect')}}">轮播内容列表</a>
                        </li>
                        <li>
                            <a href="{{URL::action('AdminController@carouselAdd')}}">轮播内容添加</a>

                        </li>



                    </ul>
                </li>
                {{--字幕组管理--}}
                <li>
                    <a href="#"><i class="fa fa-group fa-fw"></i> 字幕组管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::action('AdminController@articleList')}}">字幕组列表</a>
                        </li>
                        <li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>