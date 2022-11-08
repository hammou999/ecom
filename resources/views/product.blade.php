@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/product.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection

@section('header-top')
    <div class="header-call">
        <a href="tel:0656207310" class="animate-charcter">
            قدم طلبك مباشرة عبر الهاتف: 0656207310
        </a>
    </div>
@endsection

@section('content')
    @if ($name)
        <div class="app-heading1">
            <img src="{{asset('picture/icon/order-valide.webp')}}"/>
            <div class="welcom">مرحبا {{$name}}</div>
            <div class="confirmed">شكرا لثقتك بنا، تم تسجيل طلبك... سنتصل بك قريبا.</div>
        </div>
    @endif

    <div class="app-heading">
        <h3 class="heading-primary">دوي كموند</h3>
        <div class="product-price">
            <span class="currency-value before">
                <span class="value">3600</span>
                <span class="currency">د.ج.‏</span>
            </span>
            <span class="currency-value after">
                <span class="value">2900</span>
                <span class="currency">د.ج‏</span>
            </span>
        </div>
    </div>


    <div class="gallery js-flickity"
         data-flickity-options='{ "wrapAround": true }'>
        <div class="gallery-cell">
            <a href="product">
                <img src="{{asset('picture/product/Douille/0.webp')}}" />
            </a>
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/1.jpg')}}" />
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/2.jpg')}}" />
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/4.webp')}}" />
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/5.webp')}}" />
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/6.webp')}}" />
        </div>
        <div class="gallery-cell">
            <img src="{{asset('picture/product/Douille/7.jpg')}}" />
        </div>
    </div>


    <div class="carousel carousel-nav"
         data-flickity='{ "asNavFor": ".gallery", "contain": true, "pageDots": false }'>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/0.webp')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/1.jpg')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/2.jpg')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/4.webp')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/5.webp')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/6.webp')}}" />
        </div>
        <div class="carousel-cell">
            <img src="{{asset('picture/product/Douille/7.jpg')}}" />
        </div>
    </div>


    <div class="app-heading">
        <h3 class="heading-primary">وصف المنتج</h3>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}"  width="30px" height="30px"/>
            <p>x1 حامل مصباح.</p>
        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}"  width="30px" height="30px"/>
            <p>x1 جهاز تحكم عن بعد.</p>

        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}"  width="30px" height="30px"/>
            <p>x1 حامل جهاز التحكم.</p>
        </div>
    </div>
    <div class="app-heading">
        <h3 class="heading-primary">مميزات المنتج</h3>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}" width="30px" height="30px"/>
            <p>سهل التركيب.</p>
        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}" width="30px" height="30px"/>
            <p>مادة عالية الجودة تضمن عمر خدمة طويل.</p>
        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}" width="30px" height="30px"/>
            <p>تساعد كبار السن والعاجزين من التحكم في مصباح الغرفة من مكانهم.</p>

        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}" width="30px" height="30px"/>
            <p>إطفاء وإشعال المصباح من جهاز التحكم عن بعد 10 أمتار.</p>

        </div>
        <div class="item-list">
            <img src="{{asset('/picture/icon/checked.png')}}" width="30px" height="30px"/>
            <p>مؤقت لإنطفاء المصباح بعد مدة زمنية معينة.</p>
        </div>
    </div>

    <div class="app-heading">
        <h3 class="heading-primary">إستمارة طلب المنتج</h3>
        <p class="heading-description">يرجى ملئ الإستمارة بعناية</p>
    </div>

    <div id="app">
        <formulaire :product="{'id':'1','prix' : '2900'}">

        </formulaire>
    </div>


@endsection

@section('script')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-sync@2.0.0/flickity-sync.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>


    </script>
@endsection

