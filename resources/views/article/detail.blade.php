<link rel="stylesheet" href="{{ URL::asset('common/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/home_index.css') }}">
<script src="{{ URL::asset('js/common/jquery.js') }}"></script>
<script src="{{ URL::asset('js/common/velocity.min.js') }}"></script>
<script src="{{ URL::asset('js/common/velocity.ui.js') }}"></script>
<script src="{{ URL::asset('js/page/home.js') }}"></script>
<html>
    <body>
    <div class="canvas"></div>
    <div class="return"><i class="fa fa-arrow-circle-up fa-2x"></i></div>
    {{--header begin--}}
    <header>
        <section class="header">
            <section class="logo-zone">
                <div class="logo">
                    <ul>
                        <li>首页</li>
                        <li><img src="{{ URL::asset('images/logo_l.png') }}" alt=""></li>
                        <li class="navigation-show">论坛
                                <em class="triangle"></em>
                            <div class="navigation">
                                <div class="navigation-block">
                                    <ul>
                                        <li class="navigation-head">笑神分部</li>
                                        <li class="navigation-item">伦敦之心字幕组</li>
                                        <li class="navigation-item">来一发就走字幕组</li>
                                        <li class="navigation-item">大喜利王字幕组</li>
                                        <li class="navigation-item">加入我们</li>
                                    </ul>
                                </div>
                                <div class="navigation-block">
                                    <ul>
                                        <li class="navigation-head">洪荒之力</li>
                                        <li class="navigation-item">日综吐槽</li>
                                        <li class="navigation-item">发大水</li>
                                        <li class="navigation-item">匿名版</li>
                                        {{--<li class="navigation-item">加入我们</li>--}}
                                    </ul>
                                </div>
                                <div class="navigation-block">
                                    <ul>
                                        <li class="navigation-head">资源分享</li>
                                        <li class="navigation-item">转载发布</li>
                                        <li class="navigation-item">生肉资源</li>
                                        <li class="navigation-item">悬赏求档</li>
                                        {{--<li class="navigation-item">加入我们</li>--}}
                                    </ul>
                                </div>
                                <div class="navigation-block">
                                    <ul>
                                        <li class="navigation-head">投诉&建议</li>
                                        <li class="navigation-item">招人图</li>
                                        <li class="navigation-item">加入字幕组NOW!</li>
                                        {{--<li class="navigation-item">大喜利王字幕组</li>
                                        <li class="navigation-item">加入我们</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="user-widget">
                    <ul>
                        <li>用户名</li>
                        <li><img class="align-center" src="{{ URL::asset('images/message.png') }}" alt=""></li>
                        <li><img class="align-center" src="{{ URL::asset('images/search.png') }}" alt=""></li>
                    </ul>
                </div>
            </section>
        </section>
    </header>
    {{--header end--}}

    {{--Contents here--}}

    {{--footer begin--}}
    <footer>
        <section class="footer-wrap">
            <div class="copyRight">
                <ul>
                    <li>Copyright(C)OWARAICLUB ALL Rights Reserved</li>
                    <li>转载规则&nbsp;&nbsp;|</li>
                    <li>加入我们&nbsp;&nbsp;|</li>
                    <li>FAQ&nbsp;&nbsp;|</li>
                    <li>关于我们</li>
                </ul>
            </div>
            <div class="bottom-logo">
                <ul>
                    <li><img src="{{ URL::asset('images/logo_g.png') }}" alt=""></li>
                    <li><img src="{{ URL::asset('images/black.png') }}" alt=""></li>
                </ul>
            </div>
        </section>
    </footer>
    {{--footer end--}}
    </body>
</html>