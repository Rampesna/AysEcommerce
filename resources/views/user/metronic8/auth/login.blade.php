@extends('user.' . theme() . '.layouts.authentication')

@section('content')

    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a class="mb-12">
            <img alt="Logo" src="{{ asset('user/' . theme() . '/media/logos/logo-2-dark.svg') }}" class="h-45px" />
        </a>
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <div class="form w-100">
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">{{ __('user/login.title') }}</h1>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">{{ __('user/login.email') }}</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" id="email" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('user/login.password') }}</label>
                        <a href="#" class="link-primary fs-6 fw-bolder">{{ __('user/login.forgot-password') }}</a>
                    </div>
                    <input class="form-control form-control-lg form-control-solid" type="password" id="password" autocomplete="off" />
                </div>
                <div class="text-center">
                    <button type="submit" id="sign_in" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">{{ __('user/login.login-button') }}</span>
                        <span class="indicator-progress">{{ __('user/login.pre-loading') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-styles')

@stop

@section('page-script')
    <script>
        $('#sign_in').click(function () {
            $('.indicator-label').hide();
            $('.indicator-progress').show();
            $(this).prop('disabled', true);

            $.ajax({
                type: 'post',
                url: '{{ route('api.v1.authentication.login') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: $('#email').val(),
                    password: $('#password').val(),
                    model: 'user'
                },
                success: function (response) {
                    window.location.href = '{{ route('oauth') }}?token=' + response.response.token + '&model=user';
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });
    </script>
@stop
