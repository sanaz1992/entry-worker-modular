<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.shift_days')}} {{$shift->title}} - {{$company->title}}</h4>
                        <div class="card-header-form">
                            <a href="{{route('admin.companies.shifts.days.create', ['company' => $company, 'shift' => $shift])}}"
                                class="btn btn-icon btn-success">
                                <i class="fas fa-plus"></i>
                                @lang('company::attributes.shift_day_create')
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 ml-1">
                            <button
                                class="mx-1 btn {{$activeTab == "future_days" ? 'btn-primary' : ' btn-outline-primary'}}"
                                wire:click="$set('activeTab', 'future_days')">روزهای
                                اینده</button>
                            <button
                                class="mx-1 btn {{$activeTab == "past_days" ? 'btn-primary' : ' btn-outline-primary'}}"
                                wire:click="$set('activeTab', 'past_days')">روزهای
                                گذشته</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{__('company::attributes.title')}}</th>
                                        <th>{{__('company::attributes.date')}}</th>
                                        <th>{{__('company::attributes.work_time')}}</th>
                                        <th>{{__('company::attributes.break_time')}}</th>
                                        <th>{{__('company::attributes.created_at')}}</th>
                                        <th>{{__('company::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($shiftDays as $shiftDay)
                                        <tr>
                                            <td>{{$shiftDay->shift->title}}</td>
                                            <td>{{$shiftDay->date_jalali}}</td>
                                            <td>{{$shiftDay->start_time}} - {{$shiftDay->end_time}}</td>
                                            <td>{{$shiftDay->break_start}} - {{$shiftDay->break_end}}</td>
                                            <td>{{$shiftDay->created_at_jalali}}</td>
                                            <td>
                                                <a href="{{route('admin.companies.shifts.days.edit', ['company' => $company, 'shift' => $shift, 'day' => $shiftDay])}}"
                                                    class="btn btn-icon btn-primary"
                                                    title="@lang('company::attributes.shift_days')">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $shiftDays->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>