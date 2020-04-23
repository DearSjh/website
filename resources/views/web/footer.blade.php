<!-- footer -->
<script type="text/javascript" src="/inc/AspCms_Statistics.asp"></script>

<footer class="footer">
    {{--    <div class="footer_link">--}}
    {{--        <div class="wrap"><i class="jboicon-link"></i>友情链接：--}}
    {{--            @foreach(FriendLink() as $val)--}}
    {{--                <a href="{{ $val['url'] }}" target="_blank">{{ $val['name'] }}</a>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="footer_info">
        <div class="wrap index_">
            <div class="row">
                <div class="span-2 midd-2 smal-hide">
                    <img src="{{ Setting('logo') }}" alt="{{ Setting('name') }}">
                </div>
                <div class="span-7 midd-10 smal-12">
                    <div class="footer_nav smal-hide">
                        @foreach(NavBar() as $val)
                            <a href="{{ $val['link'] }}">{{ $val['name'] }}</a>
                        @endforeach
                    </div>
                    <div class="footer_detail">
                        <p>
                            <span>7X24服务热线：{{ Setting('hotline') }}</span>
                            　<span>电话：{{ Setting('mobile') }}</span>
                        </p>
                        <p>
                            <span>投诉及建议邮箱：{{ Setting('email') }}</span>
                        </p>
                        <p><span>地址：{{ Setting('address') }}&nbsp;&nbsp;
                            </span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>


<!-- plugs fly -->

<a class="plugin-fly_bottom_show_left" href="javascript:void(0)" style="display: none; left: -156px;"></a>
<!-- plugs top -->
<div class="top"><i class="iconfont icon-fanhuidingbu1"></i></div>
<!-- plugs mobile ring -->
<div id="plugin-contact-ring" class="hide smal-show"><a href="javascript: void(0)" id="ring-toggle-button"></a>
    <ul id="ring-list" class="r3">
        <li class="item item-phone"><a href="tel:#"><i class="icon"></i><span class="">电话</span></a></li>
        <li class="item item-sms"><a href="sms:#"><i class="icon"></i><span class="">短信</span></a></li>
        <li class="item item-map"><a href="<{spUrl c=home a=lbs}>"><i class="icon"></i><span class="">地图</span></a></li>
    </ul>
</div>
<!--includes javascript at the bottom so the page loads faster-->
<script src="/web/Templates/skin_cn/seajs/sea.js" id="seajs-browser"></script>
<script src="/web/Templates/skin_cn/seajs/seajs.config.js"></script>
<script>
    seajs.use('app/index.js')
</script>

</body>

</html>