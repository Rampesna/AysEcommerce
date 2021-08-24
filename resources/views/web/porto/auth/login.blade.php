@extends('web.porto.layouts.master')

@section('content')

    <section class="form-section">
        <div class="container">
            <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-5" style="width: 400px">
                <div class="box-content">
                    <form action="#">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-content">
                                    <h3 class="heading-text-color font-weight-normal">Giriş Yap</h3>
                                    <div class="form-group">
                                        <label for="email" class="font-weight-normal">E-posta Adresiniz</label>
                                        <input id="email" type="email" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="font-weight-normal">Şifreniz</label>
                                        <input id="password" type="password" class="form-control">
                                    </div>
                                </div>

                                <div class="form-action clearfix">
                                    <a href="#" class="pull-left">Şifremi Unuttum</a>
                                    <input type="button" id="register" class="btn btn-secondary" value="Üye Ol">
                                    <input type="button" id="login" class="btn btn-info" value="Giriş Yap">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('page-styles')

@stop

@section('page-script')
    <script>
        $('#login').click(function () {
            var email = $('#email').val();
            var password = $('#password').val();
            var model = 'customer';

            if (email == null || email === '') {
                toastr.warning('E-posta adresinizi girmediniz!');
            } else if (password == null || password === '') {
                toastr.warning('Şifrenizi girmediniz');
            } else {
                $.ajax({
                    type: 'post',
                    url: '{{ route('api.v1.authentication.login') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email,
                        password: password,
                        model: model
                    },
                    success: function (response) {
                        window.location.href = '{{ route('oauth') }}?token=' + response.response.token + '&model=customer';
                    },
                    error: function (error) {
                        console.log(error)
                        toastr.warning('Bilgileriniz hatalı!');
                    }
                });
            }
        });
    </script>
@stop
