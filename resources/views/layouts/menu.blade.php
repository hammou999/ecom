<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
    @yield('css-file')
</head>

<body>

@yield('header-top')

<nav>
    <div class="logo">
        Brand
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>
    <ul>
        <li><a class="{{ Request::is('/') ? 'active':''}}" href="{{ url('') }}">الصفحة الرئيسية</a></li>
        <li><a class="{{ Request::is('welcome') ? 'active':''}}" href="#">التصنيفات</a></li>
        <li><a class="{{ Request::is('about') ? 'active':''}}" href="{{ url('about') }}">من نحن</a></li>
        <li><a class="{{ Request::is('contact') ? 'active':''}}" href="{{ url('contact') }}">إتصل بنا</a></li>
    </ul>
</nav>
<div class="cont">
    @yield('content')
</div>


<footer class="footer-section mt-6">
    <div class="container">

        <div class="footer-content pt-2 pb-2">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-50" style="text-align: center">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid"
                                                      alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p> المتجر بوابتك الجديدة للتسوق إلكترونيا بشكل سهل وبسيط.

                                نوفر لك منتجات متععدة ذات جودة عالية لتختار منها الأفضل وبسعر تنافسي </p>
                        </div>
                        <div class="footer-social-icon mb-4 mb-md-0">
                            <span>تابعنا على</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-instagram instagram-bg"></i></a>
                            <a href="#"><i class="fab fa-whatsapp whatsapp-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30 text-center">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid"
                                                      alt="logo"></a>
                        </div>
                        <div class="footer-widget-heading">
                            <h3>روابط مفيدة</h3>
                        </div>
                        <ul>
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="#">حول المتجر</a></li>
                            <li><a href="#">التصنيفات</a></li>
                            <li><a href="#">إتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>حقوق النشر &copy; جميع الحقوق محفوظة، 2022 </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">الرئيسية</a></li>
                            <li><a href="#">التصنيفات</a></li>
                            <li><a href="#">حول المتجر</a></li>
                            <li><a href="#">إتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>





@yield('script')


</body>

</html>
