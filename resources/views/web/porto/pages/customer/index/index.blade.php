@extends('web.porto.layouts.master')

@section('content')

    <div class="container" style="margin-top: 1.25rem">
        <div class="row">
            @include('web.porto.pages.customer.layouts.aside')
            <div class="col-md-9 my-account form-section">
                <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
                    <div class="box-content">
                        <div>
                            <h4 class="heading-primary mb-lg">Kullanıcı Bilgilerini Düzenle</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-normal">Ad *</label>
                                        <input id="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="surname" class="font-weight-normal">Soyad *</label>
                                        <input id="surname" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="font-weight-normal">E-posta Adresi *</label>
                                        <input id="email" type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="font-weight-normal">Telefon Numarası</label>
                                        <input id="phone_number" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="birth_date" class="font-weight-normal">Doğum Tarihi</label>
                                        <input id="birth_date" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" class="font-weight-normal">Cinsiyet</label>
                                        <select id="gender" class="form-control">
                                            <option value="1">Erkek</option>
                                            <option value="0">Kadın</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')
    @include('web.porto.pages.customer.index.components.style')
@stop

@section('page-script')
    @include('web.porto.pages.customer.index.components.script')
@stop
