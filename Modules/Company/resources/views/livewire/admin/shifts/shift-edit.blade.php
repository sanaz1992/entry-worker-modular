<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>@lang('company::attributes.shifts_edit') {{$company->title}} </h4>
                    </div>
                    <form wire:submit="update">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>@lang('company::attributes.title')</label>
                                    <input type="text"
                                        class="form-control  @error('form.title') border-danger @enderror"
                                        wire:model="form.title">
                                    @error('form.title')
                                        <div class="error">{{ $message }}</div>
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
            @this.set('form.start_date', e.target.value);
        });

        $('#datepicker-check-out').on('change', function (e) {
            @this.set('form.end_date', e.target.value);
        });
    </script>
@endpush