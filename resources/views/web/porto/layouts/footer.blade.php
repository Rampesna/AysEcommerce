<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>Hesap</h4>
                <ul class="links">
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">Hakkımızda</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">İletişim</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">Gizlilik Politikası</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">Kullanım Şartları</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Hızlı Erişim</h4>
                <ul class="links">
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">Kategoriler</a>
                    </li>
                    <li>
                        <i class="fa fa-caret-right text-color-primary"></i>
                        <a href="#">Markalar</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4>Çok Satanlar</h4>
                <ul class="features">
                    @for($counter = 1; $counter <= 5; $counter++)
                        <li>
                            <i class="fa fa-check text-color-primary"></i>
                            <a href="#">Ürün {{ $counter }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a href="#" class="logo">
                <img alt="Porto Website Template" class="img-responsive" src="{{ asset('customer/porto/img/demos/shop/logo-white.png') }}" style="height: 35px; width: auto">
            </a>
            <img alt="Payments" src="{{ asset('customer/porto/img/demos/shop/payments.png') }}" class="footer-payment">
            <p class="copyright-text">© {{ config('app.name') }} 2021. All Rights Reserved.</p>
        </div>
    </div>
</footer>
