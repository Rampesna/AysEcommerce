@extends('user.' . theme() . '.layouts.master')
@section('title', __('user/dashboard.page-title'))
@php(setlocale(LC_ALL, 'tr_TR.UTF-8'))

@section('content')

    <div class="container-fluid">
        {{ __('user/dashboard.page-title') }}
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')

@stop
