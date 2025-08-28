<x-guest-layout>
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{__('jetstream::attributes.register')}}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="fname">{{__('jetstream::attributes.fname')}}</label>
                            <input id="fname" type="text" class="form-control" name="fname" value="{{old('fname')}}">
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="lname">{{__('jetstream::attributes.lname')}}</label>
                            <input id="lname" type="text" class="form-control" name="lname" value="{{old('lname')}}">
                            @error('lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile">{{__('jetstream::attributes.mobile')}}</label>
                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{old('mobile')}}">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">{{__('jetstream::attributes.password')}}</label>
                            <input id="password" type="password" class="form-control pwstrength"
                                data-indicator="pwindicator" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password2"
                                class="d-block">{{__('jetstream::attributes.password_confirm')}}</label>
                            <input id="password2" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{__('jetstream::attributes.register')}}
                        </button>
                    </div>
                </form>
            </div>
            <div class="mb-4 text-muted text-center">
                {{__('jetstream::messages.you_have_account')}}
                <a href="{{route('login')}}">{{__('jetstream::attributes.login')}}</a>
            </div>
        </div>
    </div>
</x-guest-layout>