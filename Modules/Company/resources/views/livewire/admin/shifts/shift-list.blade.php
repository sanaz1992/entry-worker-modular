<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.shifts')}} {{$company->title}}</h4>
                        <div class="card-header-form">
                            <a href="{{route('admin.companies.shifts.create', ['company' => $company])}}"
                                class="btn btn-icon btn-success">
                                <i class="fas fa-plus"></i>
                                @lang('company::attributes.shifts_create')
                            </a>
                            {{-- <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="جستجو">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{__('company::attributes.title')}}</th>
                                        {{-- <th>{{__('company::attributes.date')}}</th>
                                        <th>{{__('company::attributes.work_time')}}</th>
                                        <th>{{__('company::attributes.break_time')}}</th> --}}
                                        <th>{{__('company::attributes.created_at')}}</th>
                                        <th>{{__('company::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($shifts as $shift)
                                        <tr>

                                            <td>{{$shift->title}}</td>
                                            {{-- <td>{{$shift->date_jalali}}</td>
                                            <td>{{$shift->start_time}} - {{$shift->end_time}}</td>
                                            <td>{{$shift->break_start}} - {{$shift->break_end}}</td> --}}
                                            <td>{{$shift->created_at_jalali}}</td>
                                            <td>
                                                <a href="{{route('admin.companies.shifts.edit', ['company' => $company, 'shift' => $shift])}}"
                                                    class="btn btn-icon btn-primary"
                                                    title="@lang('company::attributes.shifts_edit')">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{route('admin.companies.shifts.days.index', ['company' => $company, 'shift' => $shift])}}"
                                                    class="btn btn-icon btn-info"
                                                    title="@lang('company::attributes.shift_days')">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>