<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('company::attributes.companies_create') </h4>
                    </div>
                    @if ($message)
                        <div class="alert alert-success mx-2">{{ $message }} </div>
                    @endif
                    <form wire:submit="save">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.company') </label>
                                    <select class="form-control  @error('form.company_id') border-danger @enderror"
                                        wire:model.lazy="form.company_id">
                                        <option value="">@lang('company::messages.select_company')</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}">{{$company->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.company_id')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.employee') </label>
                                    <select class="form-control  @error('form.employee_id') border-danger @enderror"
                                        wire:model="form.employee_id">
                                        <option value="">@lang('company::messages.select_employee')</option>
                                        @foreach ($companyEmployees as $companyEmployee)
                                            <option value="{{$companyEmployee->employee->id}}">
                                                {{$companyEmployee->employee->full_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('form.employee_id')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.date') </label>
                                    <input type="text" id="datepicker-check-in"
                                        class="form-control  @error('form.date') border-danger @enderror">
                                    @error('form.date')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.start_work') </label>
                                    <input type="time" wire:model="form.check_in"
                                        class="form-control  @error('form.check_in') border-danger @enderror">
                                    @error('form.check_in')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.end_work') </label>
                                    <input type="time" wire:model="form.check_out"
                                        class="form-control  @error('form.check_out') border-danger @enderror">
                                    @error('form.check_out')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>@lang('company::attributes.description') </label>
                                    <input type="text" wire:model="form.description"
                                        class="form-control  @error('form.description') border-danger @enderror">
                                    @error('form.description')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
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

@push('scripts')
    <script>
        $('#datepicker-check-in').on('change', function (e) {
            @this.set('form.date', e.target.value);
        });
    </script>
@endpush