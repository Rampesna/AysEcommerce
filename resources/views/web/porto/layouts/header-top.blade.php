<div class="header-top">
    <div class="container">
        <div class="dropdowns-container">

        </div>

        <div class="top-menu-area">
            <a href="#"><i class="fa fa-caret-down"></i></a>
            <ul class="top-menu">
                @if(!auth()->guard('customer')->check())
                    <li>
                        <a href="{{ route('web.login') }}">GİRİŞ YAP</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('web.customer.index.index') }}">HESABIM</a>
                    </li>
                    <li>
                        <a href="{{ route('web.logout') }}">ÇIKIŞ YAP</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
