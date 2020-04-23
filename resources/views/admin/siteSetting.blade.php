@extends('layouts.admin')

@section('content')

    <div class="layui-tab page-content-wrap">
        <ul class="layui-tab-title">
            <li class="layui-this">站点配置</li>
            <li>SEO配置</li>
            <li>联系信息配置</li>
        </ul>
        <div class="layui-tab-content">
            <!--站点配置-->
            <div class="layui-tab-item layui-show">
                <form class="layui-form" style="width: 90%;padding-top: 20px;">
                    <div class="layui-form-item">
                        <label class="layui-form-label">网站名称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" autocomplete="off" lay-verify="required" class="layui-input"
                                   value="{{ $data['name'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">网站域名：</label>
                        <div class="layui-input-block">
                            <input type="text" name="url" autocomplete="off" lay-verify="required" class="layui-input"
                                   value="{{ $data['url'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">logo：</label>
                        <div class="layui-input-block">
                            <input type="file" name="file" class="layui-upload-file">
                            <input type="hidden" id="i_logo" name="logo" value="{{ $data['logo'] }}">
                            <img id="logo" src="{{ $data['logo'] }}"
                                 width="80" height="80"
                                 style="margin-top: 20px; @if(empty($data['logo'])) display: none @endif">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">主标语：</label>
                        <div class="layui-input-block">
                            <input type="text" name="main_slogan" required autocomplete="off" class="layui-input"
                                   value="{{ $data['main_slogan'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">副标语：</label>
                        <div class="layui-input-block">
                            <input type="text" name="vice_slogan" required autocomplete="off" class="layui-input"
                                   value="{{ $data['vice_slogan'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">备案信息：</label>
                        <div class="layui-input-block">
                            <input type="text" name="record_sn" required autocomplete="off" class="layui-input"
                                   value="{{ $data['record_sn'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">版权信息：</label>
                        <div class="layui-input-block">
                            <input type="text" name="copyright" required autocomplete="off" class="layui-input"
                                   value="{{ $data['copyright'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-normal" lay-submit lay-filter="siteInfo">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--SEO配置-->
            <div class="layui-tab-item">
                <form class="layui-form" style="width: 90%;padding-top: 20px;">
                    <div class="layui-form-item">
                        <label class="layui-form-label">SEO标题：</label>
                        <div class="layui-input-block">
                            <input type="text" name="seo_title" placeholder="请输入seo标题" autocomplete="off"
                                   class="layui-input" value="{{ $data['seo_title'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">关键字：</label>
                        <div class="layui-input-block">
                            <input type="text" name="keyword" placeholder="请输入seo关键字" autocomplete="off"
                                   class="layui-input"
                                   value="{{ $data['keyword'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">描述：</label>
                        <div class="layui-input-block">
                        <textarea name="describe" placeholder="请输入网站描述"
                                  class="layui-textarea">{{ $data['describe'] }}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-normal" lay-submit lay-filter="siteInfo">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--联系信息配置-->
            <div class="layui-tab-item">
                <form class="layui-form" style="width: 90%;padding-top: 20px;">
                    <div class="layui-form-item">
                        <label class="layui-form-label">联系人：</label>
                        <div class="layui-input-block">
                            <input type="text" name="contact" placeholder="请输入联系人称呼" autocomplete="off"
                                   class="layui-input" style="width: 300px;"
                                   value="{{ $data['contact'] }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号：</label>
                        <div class="layui-input-block">
                            <input type="text" name="mobile" placeholder="请输入手机号" autocomplete="off" class="layui-input"
                                   value="{{ $data['mobile'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">传真：</label>
                        <div class="layui-input-block">
                            <input type="text" name="fax" placeholder="请输入传真" autocomplete="off" class="layui-input"
                                   value="{{ $data['fax'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱：</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" placeholder="请输入邮箱地址" autocomplete="off" class="layui-input"
                                   value="{{ $data['email'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">客服热线：</label>
                        <div class="layui-input-block">
                            <input type="text" name="hotline" placeholder="请输入客服热线" autocomplete="off"
                                   class="layui-input"
                                   value="{{ $data['hotline'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮编：</label>
                        <div class="layui-input-block">
                            <input type="text" name="zip_code" placeholder="请输入邮编" autocomplete="off"
                                   class="layui-input"
                                   value="{{ $data['zip_code'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">公司地址：</label>
                        <div class="layui-input-block">
                            <input type="text" name="address" placeholder="请输入公司地址" autocomplete="off"
                                   class="layui-input"
                                   value="{{ $data['address'] }}" style="width: 300px;" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-normal" lay-submit lay-filter="siteInfo">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        layui.use(['form', 'jquery', 'laydate', 'layer', 'laypage', 'dialog', 'element', 'upload', 'layedit'], function () {
            var form = layui.form(),
                layer = layui.layer,
                $ = layui.jquery,
                laypage = layui.laypage,
                laydate = layui.laydate,
                layedit = layui.layedit,
                element = layui.element(),
                dialog = layui.dialog;

            //获取当前iframe的name值
            var iframeObj = $(window.frameElement).attr('name');
            form.render();
            //监听信息提交
            form.on('submit(siteInfo)', function (data) {
                $.ajax({
                    type: "POST",
                    url: "/admin/siteSetting",
                    data: data.field,
                    success: function (result) {
                        if (result.code !== 200) {
                            layer.msg(result.msg);
                        } else {
                            layer.msg(result.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    },
                });
                return false;
            });
            //全选
            form.on('checkbox(allChoose)', function (data) {
                var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
                child.each(function (index, item) {
                    item.checked = data.elem.checked;
                });
                form.render('checkbox');
            });
            layui.upload({
                url: '/admin/upload',
                success: function (res) {
                    if (res.code === 200) {
                        $('#i_logo').val(res.data.file);
                        $('#logo').attr('src', res.data.file).show();
                    }
                }
            });

        });
    </script>

@endsection
