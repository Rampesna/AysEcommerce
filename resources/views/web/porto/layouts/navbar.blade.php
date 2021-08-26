<div class="header-container header-nav">
    <div class="container">
        <div class="header-nav-main">
            <nav>
                <ul class="nav nav-pills" id="mainNav">
                    @foreach($categories as $category)
                        <li class="dropdown dropdown-mega-small">
                            <a href="{{ route('web.product.search', ['category_id' => $category->id]) }}">
                                {{ $category->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="dropdown-mega-content dropdown-mega-content-small">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @foreach($category->subCategories as $subCategory)
                                                        <div class="col-md-4">
                                                            <a href="{{ route('web.product.search', ['category_id' => $subCategory->id]) }}" class="dropdown-mega-sub-title">{{ $subCategory->name }}</a>
                                                            <ul class="dropdown-mega-sub-nav">
                                                                @foreach($subCategory->subCategories as $sSubCategory)
                                                                    <li><a href="{{ route('web.product.search', ['category_id' => $sSubCategory->id]) }}">{{ $sSubCategory->name }}</a></li>
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
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
