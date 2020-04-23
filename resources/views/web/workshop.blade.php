@extends('layouts.web')

@section('content')

    @include('web.banner')

    <!-- 产品展示 -->
    <section class="section_inner section_nnews">
        <div class="wrap index_">
{{--            @php $info = GetArticleById() @endphp--}}
{{--            @if(!empty($info))--}}
{{--                <div class="box">--}}
{{--                    @include('web.sideLeft')--}}
{{--                    <article class="newsDetail">--}}
{{--                        <article class='content_bak'>--}}
{{--                            <header class="newsTit">--}}
{{--                                <h2>{{$info['title']}}</h2>--}}
{{--                                <p class="smal-hide">--}}
{{--                                    <span>发布时间：{{$info['created_at']}}</span>--}}
{{--                                    <span class="smal-hide"></span>--}}
{{--                                    <span class="smal-hide"></span>--}}
{{--                                    <span>点击： {{addVisits($info['id'])}}</span>--}}
{{--                                    <span>字号：<a href="javascript:" class="icon_js_c" value="16">大</a>--}}
{{--                                    <a href="javascript:" class="icon_js_c icon_js_c_hover" value="14">中</a>--}}
{{--                                    <a href="javascript:" class="icon_js_c" value="12">小</a>--}}
{{--                                    </span>--}}
{{--                                </p>--}}
{{--                            </header>--}}
{{--                            {{htmlChars( $info['content'])}}--}}
{{--                        </article>--}}
{{--                        <section class="newsDetailCur f-cb">--}}
{{--                            <ul>--}}
{{--                                <li class="l">上一条：<a href="{{ PrevTile()['link'] }}">{{ PrevTile()['title'] }}</a></li>--}}
{{--                                <li class="r">下一条：<a href="{{ NextTile()['link'] }}">{{ NextTile()['title'] }}</a></li>--}}
{{--                            </ul>--}}
{{--                        </section>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--            @else--}}
                <div class="g-bd1 f-cb">
                    <div class="g-sd1">
                        @include('web.sidebar')
                    </div>

                    <div class="g-mn1">
                        <div class="g-mn1c">

                            <div class="box">
                                @include('web.sideLeft')


                                <div class="box-cont">
                                    @php $articleAll = ArticleAll(GetCatId())  @endphp
                                    @if(empty($articleAll))
                                        <p class="f-toe">暂无数据</p>
                                    @else
                                        @foreach($articleAll as $val)
                                            <ul>
                                                @foreach(explode(',', $val['group_pic']) as $value)
                                                    <img src="{{ $value}}"
                                                         style="margin-top: 20px; width: 800px;  @if(empty($value)) display: none @endif">
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--            @endif--}}
        </div>
    </section>

@endsection

