<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('company::attributes.companies_edit') {{$company->title}}</h4>
                    </div>
                    @if ($message)
                        <div class="alert alert-success mx-2">{{ $message }} </div>
                    @endif
                    <form wire:submit="update">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label>@lang('company::attributes.company_name')</label>
                                    <input type="text"
                                        class="form-control  @error('form.title') border-danger @enderror"
                                        wire:model="form.title">
                                    @error('form.title')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>@lang('company::attributes.company_manager') </label>
                                    <select class="form-control  @error('form.manager_id') border-danger @enderror"
                                        wire:model="form.manager_id">
                                        <option value="">یک مورد انتخاب کنید</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->full_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.manager_id')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('company::attributes.logo') }} :</label>
                                    <input type="file" wire:model="form.image">
                                    @error('form.image')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                    @if (isset($form['image']) && is_object($form['image']) && method_exists($form['image'], 'temporaryUrl'))
                                        <img src="{{ $form['image']->temporaryUrl() }}" class="mr-3 rounded" width="100">
                                    @else
                                        <img src="{{ $company->logo?->getThumbnailUrl('small') }}" class="mr-3 rounded"
                                            width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">
                                @lang('company::attributes.submit')
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