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
                        @if ($selectedNodeId)
                            <button wire:click="editNode" class="btn btn-primary">ویرایش</button>
                            <button wire:click="editEmployee" class="btn btn-primary">ویرایش کارمند</button>
                        @endif
                        <button wire:click="addNode" class="btn btn-success">افزودن زیر شاخه</button>
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
                        <h5>افزودن کارمند </h5>
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
</section>

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
    </script>
@endpush