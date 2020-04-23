<div class="g-sd1">
    <div class="prod-slide">
        <div class="cate-box">
            <h3>{{ Position()[0]['name'] }}</h3>
            <ul>

                @foreach(SideBar() as $value)
                    <li class="about_a">
                    <li>
                        <a href="{{ $value['link'] }}">{{ $value['name'] }}
                            <i class="iconfont icon-xiayiye f-fr"></i>
                        </a>
                    </li>
                    </li>
                @endforeach

            </ul>

        </div>
        <div class="tel-box"><img href="/web/Templates/skin_cn/web/img/02.jpg"/>
            <p class="big">7X24咨询热线</p>
            <p class=""><strong>{{ Setting('mobile') }}</strong></p>
            <p> {{ Setting('name') }} </p>
            <p>电话: {{ Setting('hotline') }} </p>
            <p>传真: {{ Setting('fax') }} </p>
            <p>网站： {{ Setting('url') }} </p>
            <p>E-mail: {{ Setting('email') }}</p>
            <p>地址：{{ Setting('address') }} </p>
        </div>

    </div>
</div>