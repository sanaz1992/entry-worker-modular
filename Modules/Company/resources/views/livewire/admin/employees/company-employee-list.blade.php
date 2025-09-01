<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.company_employees')}} {{$company->title}}</h4>
                        <div class="card-header-form">
                            <a href="#" wire:click="showCreateUserModal" class="btn btn-icon btn-success">
                                @lang('company::attributes.create_employee')
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{__('user::attributes.avatar')}}</th>
                                        <th>{{__('user::attributes.name')}}</th>
                                        {{-- <th>{{__('company::attributes.chart_title')}}</th> --}}
                                        <th>{{__('company::attributes.created_at')}}</th>
                                        <th>{{__('company::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($employees as $user)
                                        <tr>
                                            <td>
                                                <img alt="{{$user->name}}" class="mr-3 rounded-circle" width="40"
                                                    src="{{ $user->avatar?->getThumbnailUrl('small') }}">
                                            </td>
                                            <td>{{$user->full_name}}</td>
                                            {{-- <td>
                                                {{implode(' , ', $user->charts->pluck('title')->toArray())}}
                                            </td> --}}
                                            <td>
                                                {{verta($user->pivot->created_at)->format('Y/m/d H:i')}}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-icon btn-danger"
                                                    wire:click="deleteEmployee({{$user->id}})"
                                                    wire:confirm="آیا مطمئن هستید که می‌خواهید این کاربر را حذف کنید؟"
                                                    title="@lang('company::attributes.employees_delete')">
                                                    <i class="fas fa-trash"></i>
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

    @if($showNewUserModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeNewUserModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>افزودن کارمند </h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showNewUserModal', false)">
                        </button>
                    </div>
                    <form wire:submit.prevent="createNewUser">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('user::attributes.mobile')</label>
                                <input type="text" class="form-control  @error('form.mobile') border-danger @enderror"
                                    wire:model.lazy="form.mobile">
                                @error('form.mobile')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('user::attributes.fname')</label>
                                <input type="text" class="form-control  @error('form.fname') border-danger @enderror "
                                    {{$foundMobile ? 'disabled' : ''}} wire:model.lazy="form.fname">
                                @error('form.fname')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('user::attributes.lname')</label>
                                <input type="text" class="form-control  @error('form.lname') border-danger @enderror"
                                    {{$foundMobile ? 'disabled' : ''}} wire:model.lazy="form.lname">
                                @error('form.lname')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('company::attributes.chart_title') </label>
                                <select class="form-control  @error('form.chart_id') border-danger @enderror"
                                    wire:model="form.chart_id">
                                    <option value="">یک مورد انتخاب کنید</option>
                                    @foreach ($charts as $chart)
                                        <option value="{{$chart->id}}">{{$chart->title}}</option>
                                    @endforeach
                                </select>
                                @error('form.chart_id')
                                    <div class="error">{{ $message }}</div>ّ
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
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
    @endif
</section>