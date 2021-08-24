<div class="header-container header-nav">
    <div class="container">
        <div class="header-nav-main">
            <nav>
                <ul class="nav nav-pills" id="mainNav">
                    <li class="">
                        <a class="" href="{{ route('web.product.index') }}">
                            Anasayfa
                        </a>
                    </li>
                    <li class="dropdown dropdown-mega-small">
                        <a href="#" class="dropdown-toggle">
                            Kategoriler
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-mega-content dropdown-mega-content-small">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($categories as $category)
                                                    <div class="col-md-4">
                                                        <a href="#" class="dropdown-mega-sub-title">{{ $category->name }}</a>
                                                        <ul class="dropdown-mega-sub-nav">
                                                            @foreach($category->subCategories as $subCategory)
                                                                <li><a href="#">{{ $subCategory->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
