<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('user::attributes.users_create') </h4>
                    </div>
                    @if ($message)
                        <div class="alert alert-success mx-2">{{ $message }} </div>
                    @endif
                    <form wire:submit="save">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.fname')</label>
                                    <input type="text"
                                        class="form-control  @error('form.fname') border-danger @enderror"
                                        wire:model="form.fname" required>
                                    @error('form.fname')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.lname')</label>
                                    <input type="text"
                                        class="form-control  @error('form.lname') border-danger @enderror"
                                        wire:model="form.lname" required>
                                    @error('form.lname')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.mobile')</label>
                                    <input type="text"
                                        class="form-control  @error('form.mobile') border-danger @enderror"
                                        wire:model="form.mobile" required>
                                    @error('form.mobile')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.email')</label>
                                    <input type="text"
                                        class="form-control  @error('form.email') border-danger @enderror"
                                        wire:model="form.email">
                                    @error('form.email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.password')</label>
                                    <input type="password"
                                        class="form-control  @error('form.password') border-danger @enderror"
                                        wire:model="form.password" required>
                                    @error('form.password')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.password_confirmation')</label>
                                    <input type="password"
                                        class="form-control  @error('form.password_confirmation') border-danger @enderror"
                                        wire:model="form.password_confirmation" required>
                                    @error('form.password_confirmation')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('user::attributes.avatar') }} :</label>
                                    <input type="file" wire:model="form.image">
                                    @error('form.image')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                    @if (isset($form['image']) && is_object($form['image']))
                                        <img src="{{ $form['image']->temporaryUrl() }}" class="mr-3 rounded" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit" >
                                @lang('user::attributes.submit')
                                <div wire:loading>
                                    در حال ثبت اطلاعات
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>