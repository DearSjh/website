@extends('layouts.web')

@section('content')

    @include('web.banner')

    <!-- 产品展示 -->
    <section class="section_inner section_nnews">
        <div class="wrap index_">
            @php $info = GetArticleById() @endphp
            @if(!empty($info))
                <div class="box">
                    @include('web.sideLeft')
                    <article class="newsDetail">
                        <article class='content_bak'>
                            <header class="newsTit">
                                <h2>{{$info['title']}}</h2>
                                <p class="smal-hide">
                                    <span>发布时间：{{$info['created_at']}}</span>
                                    <span class="smal-hide"></span>
                                    <span class="smal-hide"></span>
                                    <span>点击： {{addVisits($info['id'])}}</span>
                                    <span>字号：<a href="javascript:" class="icon_js_c" value="16">大</a>
                                    <a href="javascript:" class="icon_js_c icon_js_c_hover" value="14">中</a>
                                    <a href="javascript:" class="icon_js_c" value="12">小</a>
                                    </span>
                                </p>
                            </header>
                            {{htmlChars( $info['content'])}}
                        </article>
                        <section class="newsDetailCur f-cb">
                            <ul>
                                <li class="l">上一条：<a href="{{ PrevTile()['link'] }}">{{ PrevTile()['title'] }}</a></li>
                                <li class="r">下一条：<a href="{{ NextTile()['link'] }}">{{ NextTile()['title'] }}</a></li>
                            </ul>
                        </section>
                    </article>
                </div>
            @else
                <div class="g-bd1 f-cb">
                    <div class="g-sd1">
                        @include('web.sidebar')
                    </div>

                    <div class="g-mn1">
                        <div class="g-mn1c">

                            <div class="box">
                                @include('web.sideLeft')


                                <div class="box-cont">
                                    @php $articleAll = ArticleAll(GetCatId(),'',15)  @endphp
                                    @if(empty($articleAll))
                                        <p class="f-toe">暂无数据</p>
                                    @else
                                        @foreach($articleAll as $val)
                                            <div class="news-box">
                                                <div class="row">
                                                    <div class="span-9 midd-9 smal-12">
                                                        <h3 class="t f-toe">
                                                            <a href="{{ $val['link'] }}" target="_self"
                                                               title="{{ $val['title'] }}">{{ $val['title'] }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="span-3 midd-3 smal-hide f-tar"><span>【{{ TimeConvert($val['created_at'])}}】</span>
                                                    </div>
                                                </div>
                                                <p class="f-toe">{{ StrLimit($val['abstract'],52) }}</p>
                                            </div>
                                        @endforeach
                                        <div class="page">
                                            {{page()}}
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection

