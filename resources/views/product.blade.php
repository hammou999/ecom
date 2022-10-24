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
        <a href="tel:0798872905" class="animate-charcter">
            قدم طلبك مباشرة عبر الهاتف: 0668407723
        </a>
    </div>
@endsection

@section('content')
    <div class="app-heading">
        <h3 class="heading-primary">الضوء الخارق</h3>
        <div class="product-price">
            <span class="currency-value before">
                <span class="value">4500</span>
                <span class="currency">د.ج.‏</span>
            </span>
            <span class="currency-value after">
                <span class="value">2700</span>
                <span class="currency">د.ج‏</span>
            </span>
        </div>
    </div>

    <div class="carousel carousel-main" data-flickity='{ "sync": ".carousel-nav", "prevNextButtons": false }'>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
    </div>

    <div class="carousel carousel-nav"
         data-flickity='{ "asNavFor": ".carousel-main", "contain" : true, "pageDots": false }'>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
        <div class="carousel-cell"></div>
    </div>

    <div class="app-heading">
        <h3 class="heading-primary">وصف المنتج</h3>
        <p class="heading-description"></p>
    </div>


    <div class="app-heading">
        <h3 class="heading-primary">مميزات المنتج</h3>
        <p class="heading-description">ماذا تنتظر .. قدم طلبك الآن!</p>
    </div>

    <div class="app-heading">
        <h3 class="heading-primary">إستمارة طلب المنتج</h3>
        <p class="heading-description">يرجى ملئ الإستمارة بعناية</p>
    </div>

    <div id="app">
        <formulaire :product="{'id':'1','prix' : '1000'}">

        </formulaire>

    </div>
    <div class="app-heading">
        <h3 class="heading-primary">منتجات سوف تعجبك</h3>
    </div>


    <div class="products-grid">
        @for ($i = 0; $i < 10; $i++)
            <div class="product-item">
                <a href="https://farah369.com/products/aldo-alkhark" class="product-thumbnail"><img
                        data-src="https://cdn.youcan.shop/stores/c82c2f4e8acf4b0c2fe997fc6aeea9e1/products/65S1EhmZ4v4a5vgng3i4Ndt6InkiwkeYy7c8wyBV_md.jpeg"
                        alt=""
                        src="https://cdn.youcan.shop/stores/c82c2f4e8acf4b0c2fe997fc6aeea9e1/products/65S1EhmZ4v4a5vgng3i4Ndt6InkiwkeYy7c8wyBV_md.jpeg"></a>
                <div class="product-details">
                    <div class="product-info"><h3 class="product-title"><a
                                href="https://farah369.com/products/nafkh-alshfah-altbyaay-alraeaa">نافخ الشفاه
                                الرائع</a>
                        </h3>
                        <div class="product-price">
                            <span class="currency-value before">
                                <span class="value">4500</span>
                                <span class="currency">&nbsp;د.ج.‏</span>
                            </span>
                            <span class="currency-value after">
                                <span class="value">2700</span>
                                <span class="currency">&nbsp;د.ج.‏</span>
                            </span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <a href="https://farah369.com/products/nafkh-alshfah-altbyaay-alraeaa"
                           class="button small-button secondary-button"> شراء الآن</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-sync@2.0.0/flickity-sync.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection

