@extends('web.porto.layouts.master')

@section('content')

    <div class="container mt-lg">
        <div class="row">
            @include('web.porto.layouts.aside')
            <div class="col-md-9">
                <div class="col-md-9">
                    <div class="toolbar mb-none">
                        <div class="sorter">
                            <div class="sort-by">
                                <label for="order_type">Sıralama:</label>
                                <select id="order_type">
                                    <option value="id" data-order="desc">Önerilen</option>
                                    <option value="price" data-order="asc">Fiyat Artan</option>
                                    <option value="price" data-order="desc">Fiyat Azalan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="products-grid columns4" id="products">

                </ul>
            </div>

        </div>
    </div>

@endsection

@section('page-styles')
    @include('web.porto.pages.product.search.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.product.search.components.script')
@stop
