<div>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                چارت سازمانی {{ $company->title }}
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#" class="" onclick="onNodeClick(0)">
                                            <span class="border-bottom">{{ $company->title }}</span>
                                            <br>
                                            <span>{{ $company->manager->full_name }}</span>
                                        </a>
                                        <ul>
                                            @foreach ($charts as $chart)
                                                <x-company::chart.chart-node :chart="$chart" />
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    @if($showOptionModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeNodeOptionModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>مدیریت {{ $selectedNodeTitle }}</h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showOptionModal', false)">
                        </button>
                    </div>
                    <div class="modal-body">
                        <button wire:click="addNode" class="btn btn-success mt-1">افزودن زیر شاخه</button>
                        @if ($selectedNodeId)
                            <button wire:click="editNode" class="btn btn-primary mt-1">ویرایش</button>
                            {{-- <button wire:click="editEmployee" class="btn btn-warning mt-1">ویرایش کارمند</button> --}}
                            {{-- <button onclick="confirmDeleteEmployee({{ $selectedNodeId }})" class="btn btn-danger mt-1">حذف
                                کارمند</button> --}}
                            {{-- <button wire:click="getChartHistory" class="btn btn-info mt-1">تاریخچه تغییرات</button> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($showHistory)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeHistoryModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>تاریخچه تغییرات کارمند {{ $selectedNodeTitle }}</h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showHistory', false)">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>{{__('company::attributes.employee_name')}}</th>
                                        <th>{{__('company::attributes.employee_started_at')}}</th>
                                        <th>{{__('company::attributes.employee_ended_at')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('company::livewire.admin.partials.chart-refrence-tr', ['chart' => $refrence])
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($showEditModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeEditModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>ویرایش {{ $selectedNodeTitle }}</h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showEditModal', false)">
                        </button>
                    </div>
                    <form wire:submit="updateChartNode">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>@lang('company::attributes.title')</label>
                                <input type="text" class="form-control  @error('form.title') border-danger @enderror"
                                    wire:model="form.title">
                                @error('form.title')
                                    <div class="error">{{ $message }}</div>
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

    @if($showNewNodeModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeNewNodeModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>افزودن زیر شاخه به {{ $selectedNodeTitle }}</h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showNewNodeModal', false)">
                        </button>
                    </div>
                    <form wire:submit="createNewNode">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('company::attributes.title')</label>
                                <input type="text" class="form-control  @error('form.title') border-danger @enderror"
                                    wire:model="form.title">
                                @error('form.title')
                                    <div class="error">{{ $message }}</div>
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

    @if($showEmployeeModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.5)"
            onclick=" window.Livewire.dispatch('closeEmployeeModal')">
            <div class="modal-dialog modal-dialog-centered" onclick="event.stopPropagation()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>@lang('company::attributes.change_employeer') </h5>
                        <button type="button" class="far fa-window-close" wire:click="$set('showEmployeeModal', false)">
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
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/tree-family/tree.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('plugins/tree-family/tree.js') }}"></script>
    <script>
        function onNodeClick(nodeId) {
            console.log('nodeId', nodeId);
            window.Livewire.dispatch('openNodeOptionModal', { id: nodeId })
        }

        function confirmDeleteEmployee(chartId) {
            Swal.fire({
                title: 'مطمئنی؟',
                text: "این عملیات قابل بازگشت نیست!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله، حذف کن',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteEmployee', { id: chartId })
                }
            });
        }

    </script>
@endpush