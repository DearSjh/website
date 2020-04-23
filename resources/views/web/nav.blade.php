<div style="margin-top: -25px;" class="header">
    <div class="bar midd-hide">
        <div class="wrap">
            <div class="row">
                <div class="span-6 midd-hide">{{ Setting('name') }}欢迎您的到访！</div>
                <div class="span-6 midd-12">
                    <ul class="f-fr smal-12">
                        <li class="smal-6"><a href="/admin/index">后台管理</a><i class="split"></i></li>
                        <li class="smal-6"><a href="/contactUs">联系我们</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap f-pr f-cb">
        <div class="row">
            <div class="span-9 midd-12 smal-12">
                <h1 class="logo"><a href="/" title="{{ Setting('name') }}"><span></span><img
                                src="{{ Setting('logo') }}" alt="{{ Setting('name') }}"></a>
                </h1>
                <h2 class="slogan">
                    <p><i>{{ Setting('main_slogan') }}</i><br><br>
                        <small>{{ Setting('vice_slogan') }}</small></p>
                </h2>
            </div>


            <div class="span-3 midd-12 smal-hide">
                <div class="head_tel">
                    <p><i class="iconfont icon-dianhua"></i>全国咨询热线<a
                                href="tel:{{ Setting('hotline') }} ">{{ Setting('mobile') }}</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="navBox">
        <div class="wrap">
            <nav class="nav_transform1 skin-blue">
                <div class="navTop" style="display: block; left: 0px;"></div>
                <div class="bg bg1"></div>
                <div class="bg bg2"></div>
                <div class="bg bg3"></div>
                <div class="bg bg4"></div>
                <ul class="navCont f-cb">
                    @foreach(NavBar() as $val)
                        <li class="child">
                            <a href="{{ $val['link'] }}"><p class="title">{{ $val['name'] }}</p></a>
                            <ul class="childContent">
                                @foreach($val['child'] as $child)
                                    <a href="{{ $child['link'] }}">
                                        <li class="childContentLi">{{ $child['name'] }}</li>
                                    </a>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <i class="wapNavBtn iconfont icon-caidan3"></i>
</div>