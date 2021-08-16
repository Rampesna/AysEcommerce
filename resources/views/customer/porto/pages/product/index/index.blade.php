@extends('customer.porto.layouts.master')

@section('content')

    <div class="container mt-lg">
        <div class="row">
            @include('customer.porto.layouts.aside')
            @include('customer.porto.layouts.products')
        </div>
    </div>

@endsection

@section('page-styles')
    @include('customer.porto.pages.product.index.components.style')
@stop

@section('page-script')
    @include('customer.porto.pages.product.index.components.script')
@stop
