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

    {{--banner begin--}}
    <section class="banner"></section>
    {{--banner end--}}

    {{--topic begin--}}
    <section class="topic-warp">
        <section class="topic">
            <div class="topic-left">
                <div class="scroll">
                    {{--<div class="frosted-glass"></div>--}}
                    <img class="scroll-img" src="{{ URL::asset('images/620px.png') }}" alt="">
                    <p class="scroll-des">【来一发就走字幕组】AMETALK 有趣人才推荐会 (水平居中）</p>
                </div>
                <div class="link">
                    <ul>
                        <li>男女纠察队</li>
                        <li>男女纠察队</li>
                        <li>男女纠察队</li>
                        <li>男女纠察队</li>
                    </ul>
                </div>
            </div>
            <div class="topic-right">
                <div class="topic-head">
                    <span>TOP话题</span>
                    <span>更多</span>
                </div>
                <div class="topic-body">
                    <div class="topic-discus">
                        <div class="topic-file">
                            <div class="rotate"></div>
                            <span class="topic-number">1</span>
                        </div>
                        <div class="topic-des">
                            <p>帖子标题帖子标题帖子标题帖题子标题帖子标题帖子标题</p>
                            <p>35个评论</p>
                        </div>
                    </div>
                    <div class="topic-discus">
                        <div class="topic-file">
                            <div class="rotate"></div>
                            <span class="topic-number">2</span>
                        </div>
                        <div class="topic-des">
                            <p>帖子标题帖子标题帖子标题帖题子标题帖子标题帖子标题</p>
                            <p>35个评论</p>
                        </div>
                    </div>
                    <div class="topic-discus">
                        <div class="topic-file">
                            <div class="rotate"></div>
                            <span class="topic-number">3</span>
                        </div>
                        <div class="topic-des">
                            <p>帖子标题帖子标题帖子标题帖题子标题帖子标题帖子标题</p>
                            <p>35个评论</p>
                        </div>
                    </div>
                    <div class="topic-discus">
                        <div class="topic-file">
                            <div class="rotate"></div>
                            <span class="topic-number">4</span>
                        </div>
                        <div class="topic-des">
                            <p>帖子标题帖子标题帖子标题帖题子标题帖子标题帖子标题</p>
                            <p>35个评论</p>
                        </div>
                    </div>
                    <div class="topic-discus">
                        <div class="topic-file">
                            <div class="rotate"></div>
                            <span class="topic-number">5</span>
                        </div>
                        <div class="topic-des">
                            <p>帖子标题帖子标题帖子标题帖题子标题帖子标题帖子标题</p>
                            <p>35个评论</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="program"><p>番组时间</p></div>
        </section>
    </section>
    {{--topic end--}}

    {{--main begin--}}
    <section class="main">
        {{--模块一--}}
        <section class="main-one">
            <div class="main-one-left">
                <div class="main-one-head topic-head">
                    <span>综艺</span>
                    <span>更多</span>
                </div>
                <div class="main-one-body">
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                    <div class="main-one-block">
                        <div class="main-one-block-img"><img src="{{ URL::asset('images/210px.png') }}" alt=""></div>
                        <div class="main-one-block-des">【伦敦之心字幕组】161125 london hearts 男艺人自我排名</div>
                    </div>
                </div>
            </div>
            <div class="main-one-right">
                <div class="main-one-head topic-head">
                    <span>字幕组推荐</span>
                    <span><  ></span>
                </div>
                <div class="main-one-right-body">
                    <div class="main-one-right-block"></div>
                    <div class="main-one-right-block"></div>
                    <div class="main-one-right-block"></div>
                    <div class="main-one-right-block"></div>
                </div>
            </div>
        </section>
        {{--模块一--}}

        {{--模块二--}}
        <section class="main-two">
            <div class="main-two-left">
                <div class="main-two-left-head topic-head">
                    <span>
                        <ul>
                            <li>漫才</li>
                            <li>短剧</li>
                            <li>段子</li>
                            <li>番组</li>
                            </ul>
                    </span>
                    <span>更多</span>
                </div>
                <div class="main-two-left-body">
                    <div class="main-two-left-block">
                        <div class="main-two-left-block-img">
                            <img src="{{ URL::asset('images/233px.png') }}" alt="">
                        </div>
                        <div class="main-two-left-block-des">
                            <h4>标题</h4>
                            <p>推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语</p>
                        </div>
                    </div>
                    <div class="main-two-left-block">
                        <div class="main-two-left-block-img">
                            <img src="{{ URL::asset('images/233px.png') }}" alt="">
                        </div>
                        <div class="main-two-left-block-des">
                            <h4>标题</h4>
                            <p>推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语</p>
                        </div>
                    </div>
                    <div class="main-two-left-block">
                        <div class="main-two-left-block-img">
                            <img src="{{ URL::asset('images/233px.png') }}" alt="">
                        </div>
                        <div class="main-two-left-block-des">
                            <h4>标题</h4>
                            <p>推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语推荐语</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-two-right">
                <div class="main-two-right-block">
                    <div class="main-two-right-block-img"></div>
                    <div class="main-two-right-block-des">
                        <h4>[讨论]说说你最爱的综艺节目</h4>
                        <p>什么？听说你喜欢神舌</p>
                    </div>
                </div>
                <div class="main-two-right-block">
                    <div class="main-two-right-block-img"></div>
                    <div class="main-two-right-block-des">
                        <h4>[讨论]说说你最爱的综艺节目</h4>
                        <p>什么？听说你喜欢神舌</p>
                    </div>
                </div>
            </div>
        </section>
        {{--模块二--}}
    </section>
    {{--main end--}}

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