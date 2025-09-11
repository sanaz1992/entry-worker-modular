<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.company_employees')}} {{$company->title}}</h4>
                        <div class="card-header-form">
                            <a href="{{route('admin.companies.employees.create', ['company' => $company])}}"
                                class="btn btn-icon btn-success">
                                <i class="fas fa-plus"></i>
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
                                        <th>{{__('company::attributes.chart_node')}}</th>
                                        <th>{{__('company::attributes.shift')}}</th>
                                        <th>{{__('company::attributes.created_at')}}</th>
                                        <th>{{__('company::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($companyEmployees as $companyEmployee)
                                        <tr>
                                            <td>
                                                <img alt="{{$companyEmployee->employee->name}}" class="mr-3 rounded-circle"
                                                    width="40"
                                                    src="{{ $companyEmployee->employee->avatar?->getThumbnailUrl('small') }}">
                                            </td>
                                            <td>{{$companyEmployee->employee->full_name}}</td>
                                            <td>{{$companyEmployee->chart->title}}</td>
                                            <td>{{$companyEmployee->shift->title}}</td>
                                            <td>
                                                {{verta($companyEmployee->created_at)->format('Y/m/d H:i')}}
                                            </td>
                                            <td>
                                                <button onclick="confirmDeleteEmployee({{$companyEmployee->id}})"
                                                    class="btn btn-icon btn-danger"
                                                    title="@lang('company::attributes.employees_delete')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
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

@push('scripts')
    <script>
     

        function confirmDeleteEmployee(companyEmployeeId) {
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
                    Livewire.dispatch('deleteEmployee', { id: companyEmployeeId })
                }
            });
        }

    </script>
@endpush