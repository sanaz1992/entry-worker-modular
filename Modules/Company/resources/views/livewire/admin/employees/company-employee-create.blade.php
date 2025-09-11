<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('company::attributes.create_employee') {{$company->title}}</h4>
                    </div>
                    @if ($message)
                        <div class="alert alert-success mx-2">{{ $message }} </div>
                    @endif
                    <form wire:submit="save">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.mobile')</label>
                                    <input type="text"
                                        class="form-control  @error('form.mobile') border-danger @enderror"
                                        wire:model.lazy="form.mobile">
                                    @error('form.mobile')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.fname')</label>
                                    <input type="text"
                                        class="form-control  @error('form.fname') border-danger @enderror "
                                        {{$foundMobile ? 'disabled' : ''}} wire:model.lazy="form.fname">
                                    @error('form.fname')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('user::attributes.lname')</label>
                                    <input type="text"
                                        class="form-control  @error('form.lname') border-danger @enderror"
                                        {{$foundMobile ? 'disabled' : ''}} wire:model.lazy="form.lname">
                                    @error('form.lname')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.chart_node') </label>
                                    <select class="form-control  @error('form.chart_id') border-danger @enderror"
                                        wire:model="form.chart_id">
                                        <option value="">@lang('company::messages.select_chart_node')</option>
                                        @foreach ($charts as $chart)
                                            <option value="{{$chart->id}}">{{$chart->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.chart_id')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.shift') </label>
                                    <select class="form-control  @error('form.shift_id') border-danger @enderror"
                                        wire:model="form.shift_id">
                                        <option value="">@lang('company::messages.select_shift')</option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{$shift->id}}">{{$shift->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('form.shift_id')
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