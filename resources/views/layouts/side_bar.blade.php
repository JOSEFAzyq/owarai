<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="{{URL::action('AdminController@index')}}">某科学的后台</a>

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
                <?php foreach ($authority as $v){?>
                <li>
                    <a href="#"><i class="fa {{$v['class']}} fa-fw"></i> {{$v['title']}}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php foreach ($v['column'] as $value){?>
                        <li>
                            <a href="{{$value['action']}}">{{$value['title']}}</a>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>