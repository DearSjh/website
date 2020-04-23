<h2 class="box-title f-cb"><strong> {{ CatInfo('','curr')['name'] }}</strong>
    <div class="PageCrumbList">当前位置：
        <a href="/" title="首页">首页</a>
        @foreach(Position() as $bd)
            > <a href="{{ $bd['link'] }}">{{ $bd['name'] }}</a>
        @endforeach
    </div>
</h2>