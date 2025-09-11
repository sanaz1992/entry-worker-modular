<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('company::attributes.shift_day_edit') {{$shift->title}} - {{$company->title}} </h4>
                    </div>
                    <form wire:submit="update">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.date') </label>
                                    <input type="text" id="datepicker-check-in" wire:model="form.this_date"
                                        class="form-control  @error('form.date') border-danger @enderror">
                                    @error('form.date')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.start_time') </label>
                                    <input type="time" wire:model="form.start_time"
                                        class="form-control  @error('form.start_time') border-danger @enderror">
                                    @error('form.start_time')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.end_time') </label>
                                    <input type="time" wire:model="form.end_time"
                                        class="form-control  @error('form.end_time') border-danger @enderror">
                                    @error('form.end_time')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.break_start_time') </label>
                                    <input type="time" wire:model="form.break_start"
                                        class="form-control  @error('form.break_start') border-danger @enderror">
                                    @error('form.break_start')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.break_end_time') </label>
                                    <input type="time" wire:model="form.break_end"
                                        class="form-control  @error('form.break_end') border-danger @enderror">
                                    @error('form.break_end')
                                        <div class="error">{{ $message }}</div>ّ
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success mr-1" type="submit">
                                @lang('company::attributes.submit')
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
            @this.set('form.this_date', e.target.value);
        });


    </script>
@endpush