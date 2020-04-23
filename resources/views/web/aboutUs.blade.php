@extends('layouts.web')

@section('content')


    @include('web.banner')

<!-- 产品展示 -->
<section class="section_inner">
    <div class="wrap index_">
        <div class="g-bd1 f-cb"> <div class="g-sd1">
                @include('web.sidebar')

            </div>

            <div class="g-mn1">
                <div class="g-mn1c">
                    <div class="box">
                        @include('web.sideLeft')
                        <div class="box-cont">
                            {{htmlChars(GetArticleByCatId()['content'])}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
