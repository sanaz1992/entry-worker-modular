<x-guest-layout>
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{__('jetstream::attributes.login')}}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="mobile">{{__('jetstream::attributes.mobile')}}</label>
                        <input id="mobile" type="mobile" class="form-control" name="mobile" tabindex="1" required>
                    </div>
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">{{__('jetstream::attributes.password')}}</label>
                            <div class="float-right">
                                <a href="auth-forgot-password.html" class="text-small">
                                    {{__('jetstream::messages.forget_your_password')}}
                                </a>
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            {{__('jetstream::attributes.login')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-5 text-muted text-center">
            {{__('jetstream::messages.you_can_signup')}}
            <a href="{{route('register')}}">
                {{__('jetstream::messages.create_account')}}
            </a>
        </div>
    </div>
</x-guest-layout>