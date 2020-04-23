@extends('layouts.web')

@section('content')


    <!-- banner -->
    <div class="indexbanner">
        <div id="slider">
            <ul class="slides clearfix">
                @foreach(Banner() as $banner)
                    <li><img class="responsive" src="{{ $banner['picture'] }}" alt="{{ $banner['title'] }}"></li>
                @endforeach
            </ul>
            <ul class="controls">
                <li><img src="/web/Templates/skin_cn/images/prev.png" alt="previous"></li>
                <li><img src="/web/Templates/skin_cn/images/next.png" alt="next"></li>
            </ul>
            <ul class="pagination">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>

        </div>
        <script src="/web/Templates/skin_cn/js/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="/web/Templates/skin_cn/js/easySlider.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#slider").easySlider({
                    slideSpeed: 500,
                    paginationSpacing: "15px",
                    paginationDiameter: "12px",
                    paginationPositionFromBottom: "20px",
                    slidesClass: ".slides",
                    controlsClass: ".controls",
                    paginationClass: ".pagination"
                });
            });
        </script>
    </div>

    <!-- 产品展示 -->
    <section class="section_pro">
        <div class="wrap index_">
            <div class="g-bd1 f-cb">
                <div class="g-sd1">
                    <div class="prod-slide">
                        <div class="cate-box">
                            @if(GetLang() == 1)
                                <h3>产品中心</h3>
                            @else
                                <h3>Product</h3>
                            @endif
                            <ul>
                                @foreach(BarSubset('product') as $value)
                                    <li>
                                        <a href="{{ $value['link'] }}">{{ $value['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tel-box">
                            @if(GetLang() == 1)
                                <p class="big"><i class="iconfont icon-dianhua"></i>7X24咨询热线</p>
                            @else
                                <p class="big"><i class="iconfont icon-dianhua"></i>7X24 Hot line</p>
                            @endif
                            <p class=""><strong>{{ Setting('hotline') }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="g-mn1">
                    <div class="g-mn1c">
                        <div class="prod-cont">
                            <div class="row">

                                @foreach(GetArticleByDirName('product') as $val)
                                    <div class="span-4 midd-4 smal-6">
                                        <div class="media-box i-prorec">
                                            <div class="icon widget-respimg js-respimg" data-ratiow="295"
                                                 data-ratioh="200"
                                                 style="width: 300px; height: 203px;"><img
                                                        src="{{ $val['main_pic'] }}"
                                                        alt="{{ $val['title'] }}" title="{{ $val['title'] }}">
                                                <div class="bg"></div>
                                                <a href="{{ $val['link'] }}" title="{{ $val['title'] }}"
                                                   class="bg-text">
                                                    @if(GetLang() == 1)
                                                        <span class="num">产品类型</span>
                                                    @else
                                                        <span class="num">Product</span>
                                                    @endif
                                                    <span class="price">{{$val['category_name']}}<br>{{StrLimit($val['abstract'],20)}}</span>
                                                </a>
                                            </div>
                                            <p class="f-toe">{{ $val['title'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 公用横幅 -->
    <section class="section_public">
        <div class="wrap index_">
            <article class="article row">
                @if(GetLang() == 1)
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(7)['main_pic'] }}" alt="{{ GetCustomData(7)['name'] }}">
                    </div>
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(10)['main_pic'] }}" alt="{{ GetCustomData(10)['name'] }}">
                    </div>
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(9)['main_pic'] }}" alt="{{ GetCustomData(9)['name'] }}">
                    </div>
                @else
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(13)['main_pic'] }}" alt="{{ GetCustomData(13)['name'] }}">
                    </div>
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(16)['main_pic'] }}" alt="{{ GetCustomData(16)['name'] }}">
                    </div>
                    <div class="span-4 midd-hide">
                        <img src="{{ GetCustomData(15)['main_pic'] }}" alt="{{ GetCustomData(15)['name'] }}">
                    </div>
                @endif
            </article>

        </div>
    </section>

    <!-- 我们优势 -->
    <section class="section_advtage">
        <div class="wrap index_">

            <article class="article">
                <div class="row">
                    <div class="span-6 midd-12 smal-12">
                        <div class="span-12">
                            <div class="services-box adv01">
                                <h3>
                                    <p>{{ GetCustomData(2)['name'] }}</p>
                                    <small class="f-toe">{{ GetCustomData(2)['value'] }}</small>
                                </h3>
                                {{ htmlChars(GetCustomData(2)['content']) }}
                            </div>
                        </div>
                        <div class="span-12">
                            <div class="services-box adv02">
                                <h3>
                                    <p>{{ GetCustomData(3)['name'] }}</p>
                                    <small class="f-toe">{{ GetCustomData(3)['value'] }}</small>
                                </h3>
                                {{ htmlChars(GetCustomData(3)['content']) }}
                            </div>
                        </div>
                    </div>
                    <div class="span-6 midd-12 smal-hide f-tac"><img
                                src="{{ GetCustomData(8)['main_pic'] }}"
                                alt="{{ Setting('name') }}{{ GetCustomData(8)['name'] }}">
                    </div>
                </div>
                <div class="row ">
                    <div class="span-6 midd-12 smal-hide f-tac">
                        <video style="max-width: 100%; border: 0;vertical-align: top;height: 382px"
                               src="{{ GetCustomData(11)['file'] }}" controls="controls"
                               alt="{{ GetCustomData(11)['name'] }}">
                        </video>
                    </div>
                    <div class="span-6 midd-12 smal-12">
                        <div class="span-12">
                            <div class="services-box adv03">
                                <h3>
                                    <p>{{ GetCustomData(4)['name'] }}</p>
                                    <small class="f-toe">{{ GetCustomData(4)['value'] }}</small>
                                </h3>
                                {{ htmlChars(GetCustomData(4)['content']) }}
                            </div>
                        </div>
                        <div class="span-12">
                            <div class="services-box adv04">
                                <h3>
                                    <p>{{ GetCustomData(5)['name'] }}</p>
                                    <small class="f-toe">{{ GetCustomData(5)['value'] }}</small>
                                </h3>
                                {{ htmlChars(GetCustomData(5)['content']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- 客户案例 -->
    <section class="section_case">
        <div class="wrap index_">
            <article class="article">
                <header class="T">
                    <h2>客户案例</h2>
                    <h3>优质的产品赢得千万家客户的信赖</h3>
                </header>
            </article>
            <div class="jcarousel-wrapper">
                <div class="jcarousel" id="jcarousel1" data-jcarousel="true" data-jcarouselautoscroll="true">
                    <ul style="top: 0px; left: -320px;">

                        @foreach(GetArticleByDirName('product','created_at') as $val)
                            <li class="case-item" style="width: 300px;">
                                <div class="icon port-box" data-ratiow="258" data-ratioh="176"
                                     style="width: 284px; height: 193px;">
                                    <img src="{{ $val['main_pic'] }}" alt="{{ $val['title'] }}"
                                         title="{{ $val['title'] }}">
                                </div>
                                <p class="f-tac f-toe">{{ $val['title'] }}</p>
                            </li>

                        @endforeach
                    </ul>
                </div>
                <p class="jcarousel-pagination hide" data-jcarouselpagination="true"><a href="#1">1</a><a href="#2"
                                                                                                          class="">2</a><a
                            href="#3" class="active">3</a><a href="#4">4</a><a href="#5">5</a></p>
                <a href="#" class="jcarousel-control jcarousel-control-prev" data-jcarouselcontrol="true"><</a> <a
                        href="#"
                        class="jcarousel-control jcarousel-control-next"
                        data-jcarouselcontrol="true">></a>
            </div>
        </div>
    </section>

    <!-- 新闻 -->
    <section class="section_news">
        <div class="wrap index_">
            <article class="article">
                <div class="row">
                    <div class="span-6 midd-6 smal-12">
                        <h2 class="box-t"><strong>新闻中心</strong><small>NEWS</small>
                            <div class="iconMore">
                                <a href="/news" title="{{ Setting('name') }}最新资讯"><i>+</i></a>
                            </div>
                        </h2>
                        <ul class="new-box">
                            @foreach(GetArticleByDirName('news','created_at',6) as $val)
                                <li class="f-cb open">
                                    <div class="iconDetail"></div>
                                    <a href="{{ $val['link'] }}" title="{{ $val['title'] }}">{{ $val['title'] }}</a>
                                </li>
                                <div class="licont" style="display: block;">
                                    　　{{ $val['abstract'] }}
                                </div>
                            @endforeach


                        </ul>
                    </div>
                    <div class="span-6 midd-6 smal-12">
                        <h2 class="box-t"><strong>{{ GetCustomData(1)['name'] }} </strong><small>aboutUs</small>
                            <div class="iconMore"><a href="{{ GetCustomData(1)['link'] }}"
                                                     title="{{ GetCustomData(1)['picture'] }}"><i>+</i></a>
                            </div>
                        </h2>
                        <div class="about-box"><img src="{{ GetCustomData(1)['main_pic'] }}">
                            <p>{{ GetCustomData(1)['value'] }}</p>
                        </div>
                    </div>

                </div>
            </article>
        </div>
    </section>

@endsection
