@extends('layouts.menu')

@section('title')
    <title>متجر تحفة يرحب بكم</title>
@endsection


@section('css-file')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"/>
@endsection

@section('header-top')
    <div class="header-call">
        <a class="animate-charcter">
            قدم طلبك مباشرة عبر الهاتف: 0668407723
        </a>
    </div>
@endsection


@section('content')
    <div class="contentt">
        <!-- Flickity HTML init -->

        <div class="app-heading">
            <h3 class="heading-primary">المنتجات الأكثر طلباً</h3>
            <p class="heading-description">كل ماتريد .. بين يديك .. بضغطة زر!</p>
        </div>

        <div class="gallery js-flickity"
             data-flickity-options='{ "wrapAround": true }'>
            <div class="gallery-cell">
                <a href="product">
                    <img src="{{asset('picture/product/1.webp')}}" />
                </a>
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/2.webp')}}" />
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/3.webp')}}" />
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/4.webp')}}" />
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/5.webp')}}" />
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/6.webp')}}" />
            </div>
            <div class="gallery-cell">
                <img src="{{asset('picture/product/7.webp')}}" />
            </div>
        </div>

        <div class="app-heading">
            <h3 class="heading-primary">منتجات المتجر</h3>
            <p class="heading-description">ماذا تنتظر .. قدم طلبك الآن!</p>
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
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
@endsection
