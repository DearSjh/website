@extends('layouts.web')

@section('content')

    @include('web.banner')
    <!-- 产品展示 -->
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
                            @if(CatInfo('','curr')['dir_name'] == 'message')
                                <div class="box-cont" style="text-align: center">
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px;">
                                            标题:
                                        </div>
                                        <div>
                                            <input type="text" name='title'>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px;color:red">
                                            姓名:
                                        </div>
                                        <div>
                                            <input type="text" name='name'>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px;color:red">
                                            电话:
                                        </div>
                                        <div>
                                            <input type="text" name='mobile'>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px">
                                            E-mail:
                                        </div>
                                        <div>
                                            <input type="text" name='email'>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px">
                                            地址:
                                        </div>
                                        <div>
                                            <input type="text" name='address'>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin: 20px 0px">
                                        <div style="margin: 0px 10px;height: 30px;width: 80px">
                                            内容:
                                        </div>
                                        <div>
                                            <input type="text" style="height: 80px;width: 400px" name='content'>
                                        </div>
                                    </div>

                                    <div style="display: flex;margin: 20px 0px;height: 27px">
                                        <div class='text' style="margin: 0px 10px;height: 30px;width: 80px">验证码</div>
                                        <div class='input'>
                                            <input type="text" name="vercode" id="LAY-user-login-vercode"
                                                   lay-verify="required" placeholder="图形验证码"
                                                   class="layui-input" autocomplete="off"
                                                   style="height: 30px;width: 80px">

                                            <img src="" class="layadmin-user-login-codeimg" style="height: 100%;"
                                                 id="LAY-user-get-vercode">
                                        </div>
                                    </div>
                                    <div>
                                        <input value="提交" style="width:60px;" type="button" class="message_button">
                                    </div>
                                </div>
                            @else
                                <div class="box-cont">
                                    <div><span style="font-size: x-large;">{{ Setting('name') }}</span></div>
                                    <div>联系人：{{ Setting('contact') }}</div>
                                    <div>销售热线：{{ Setting('mobile') }}</div>
                                    <div>电话：{{ Setting('hotline') }}&nbsp;</div>
                                    <div>传真号码：{{ Setting('fax') }}</div>
                                    <div>E-Mail：{{ Setting('email') }}</div>
                                    <div>邮编：{{Setting('zip_code')}}</div>
                                    <div>网址：{{ Setting('url') }}</div>
                                    <p>公司地址：{{ Setting('address') }}&nbsp;</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        input, textarea {
            border: 1px solid #C0C0C0;
            width: 200px;
            min-height: 25px;
            line-height: 25px;
            text-align: center;
            border-collapse: collapse;
            border-radius: 5px;
            background: none;
            outline: none;
        }
    </style>
    <script>
        //ajax
        $('.message_button').click(function () {
            var mobile = $("input[name='mobile']").val(),
                name = $("input[name='name']").val(),
                vercode = $("input[name='vercode']").val(),
                title = $("input[name='title']").val(),
                email = $("input[name='email']").val(),
                address = $("input[name='address']").val(),
                content = $("input[name='content']").val();

            $.ajax({
                //请求方式
                type: "POST",

                url: "/contactUs/message",
                data: {
                    mobile: mobile,
                    name: name,
                    vercode: vercode,
                    title: title,
                    email: email,
                    address: address,
                    content: content,
                },
                //请求成功
                success: function (result) {
                    if (result.code !== 200) {
                        layer.msg(result.msg);
                    } else {
                        layer.msg(result.msg);
                        window.location.reload()
                    }
                },
            });

        })

        $('#LAY-user-get-vercode').click(function () {
            captcha();
        });

        captcha();

        function captcha() {
            $.getJSON('/captcha', function (data) {
                $('#LAY-user-get-vercode').attr('src', data.data);
            });
        }

    </script>

@endsection
