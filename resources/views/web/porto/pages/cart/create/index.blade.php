@extends('web.porto.layouts.master')

@section('content')

    Kart Ekranı

@endsection

@section('page-styles')
    @include('web.porto.pages.cart.create.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.cart.create.components.script')
@stop
