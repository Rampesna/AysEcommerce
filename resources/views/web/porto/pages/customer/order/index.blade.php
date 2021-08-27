@extends('web.porto.layouts.master')

@section('content')

    Siparişler Sayfası

@endsection

@section('page-styles')
    @include('web.porto.pages.customer.order.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.customer.order.components.script')
@stop
