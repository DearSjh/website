@extends('layouts.web')

@section('content')
    @php $info = GetArticleById() @endphp

    @if(!empty($info))

        <section class="section_inner">
            <div class="wrap index_">
                <!-- 产品详细 -->
                <article class="prodDetail">
                    <article class='content_bak'>
                        <div class="row">
                            <div class="span-5 midd-4 smal-12 deleft">
                                <div class="f-picmid"><img src="{{ $info['main_pic'] }}"
                                                           alt="{{ $info['title'] }}" title="{{ $info['title'] }}">
                                </div>
                            </div>
                            <div class="span-7 midd-8 smal-12">
                                <div class="deright">
                                    <h4>{{ $info['title'] }} <span>{{CatInfo('','curr')['name']}}</span></h4>
                                    <ul class="mt15">
                                        <li>
                                            简介：{{ $info['abstract'] }}
                                        </li>
                                    </ul>
                                    <div class="yuall f-cb"><a href="tel:{{ Setting('mobile') }}" target="_blank"
                                                               class="yy"></i>咨询热线：{{ Setting('mobile') }}</a> <a
                                                href="/contactUs/message" target="_blank" class="zx smal-hide"><i
                                                    class="iconfont icon-weibiaoti1"></i>留言给我们</a></div>
                                </div>
                            </div>
                        </div>
                        <h5><strong>产品详细</strong></h5>
                        <div class="prod_c">
                            {{htmlChars( $info['content'])}}
                            <script src="/inc/AspCms_VisitsAdd.asp?id=2312"></script>
                        </div>
                        <div class="newsNote">
                            <div class="row">
                                <div class="span-8 smal-12">
                                    <p><strong>感谢您访问我们的网站</strong></p>
                                    <p>如需订购欢迎来电咨询:</p>
                                    <p>联系人：{{ Setting('contact') }} {{ Setting('mobile') }}</p>
                                    <p>我们将竭诚为您提供让您满意的服务！</p>
                                </div>
                                <div class="span-4 smal-12">
                                    <a href="{{ Setting('url') }}">
                                        <img width="130" height="130" src="{{ Setting('logo') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <section class="newsDetailCur f-cb">
                            <ul>
                                <li class="l">上一篇：<a href="{{ PrevTile()['link'] }}">{{ PrevTile()['title'] }}</a></li>
                                <li class="r">下一篇：<a href="{{ NextTile()['link'] }}">{{ NextTile()['title'] }}</a></li>
                            </ul>
                        </section>
                    </article>
                </article>
                <!-- 推荐产品 -->
                <article class="newsRecmd">
                    <h4>推荐产品</h4>
                    <section class="box-c">
                        <div class="row">
                            @foreach(ArticleAll(GetCatId(),'',4) as $val)
                                <div class="span-3 midd-4 smal-6"><a href="{{ $val['link'] }}"
                                                                     class="media-box"
                                                                     title="{{ $val['title'] }}">
                                        <div class="icon widget-respimg js-respimg" data-ratioW="295"
                                             data-ratioH="190"><img
                                                    src="{{ $val['main_pic'] }}"
                                                    alt="{{ $val['title'] }}" title="{{ $val['title'] }}">
                                        </div>
                                        <p class="f-toe">{{ $val['title'] }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </article>
            </div>
        </section>

    @else

        @include('web.banner')

        <!-- 产品 -->
        <section class="section_inner">
            <div class="wrap index_">
                <div class="g-bd1 f-cb">
                    <div class="g-sd1">
                        @include('web.sidebar')
                    </div>

                    <div class="g-mn1">
                        <div class="g-mn1c">
                            <div class="box">
                                @include('web.sideLeft')

                                <section class="prod-cont">
                                    <div class="row">
                                        @php $articleAll = ArticleAll(GetCatId(),'',12)  @endphp
                                        @if(empty($articleAll))
                                            <p class="f-toe">暂无数据</p>
                                        @else
                                            @foreach($articleAll as $val)
                                                <div class="span-4 midd-4 smal-6"><a href="{{ $val['link'] }}"
                                                                                     class="media-box"
                                                                                     title="{{ $val['title'] }}">
                                                        <div class="icon widget-respimg js-respimg" data-ratioW="295"
                                                             data-ratioH="190"><img
                                                                    src="{{ $val['main_pic'] }}"
                                                                    alt="{{ $val['title'] }}"
                                                                    title="{{ $val['title'] }}">
                                                        </div>
                                                        <p class="f-toe">{{ $val['title'] }}</p>
                                                    </a>
                                                </div>
                                            @endforeach
                                    </div>
                                </section>
                                <div class="page">
                                 {{page()}}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

@endsection

