@extends('web.porto.layouts.master')

@section('content')

    <div class="container mt-lg">
        <div class="row">
            @include('web.porto.layouts.aside')
            @include('web.porto.layouts.products')
        </div>
    </div>

@endsection

@section('page-styles')
    @include('web.porto.pages.product.index.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.product.index.components.script')
@stop
