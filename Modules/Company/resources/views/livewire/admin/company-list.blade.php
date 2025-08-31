<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.companies')}}</h4>
                        <div class="card-header-form">
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
                                        <th>{{__('company::attributes.logo')}}</th>
                                        <th>{{__('company::attributes.company_name')}}</th>
                                        <th>{{__('company::attributes.company_manager')}}</th>
                                        <th>{{__('company::attributes.workers_count')}}</th>
                                        <th>{{__('company::attributes.status')}}</th>
                                        <th>{{__('company::attributes.created_at')}}</th>
                                        <th>{{__('company::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>
                                                <img alt="{{$company->title}}" class="mr-3 rounded-circle" width="40"
                                                    src="{{ $company->logo?->getThumbnailUrl('small') }}">
                                            </td>
                                            <td>{{$company->title}}</td>
                                            <td>{{$company->manager->full_name}}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{$company->created_at_jalali}}</td>
                                            <td>
                                                <a href="{{route('admin.companies.show', $company)}}"
                                                    class="btn btn-icon btn-success"
                                                    title="@lang('company::attributes.companies_show')">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{route('admin.companies.edit', $company)}}"
                                                    class="btn btn-icon btn-primary"
                                                    title="@lang('company::attributes.companies_edit')">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="{{route('admin.companies.chart', $company)}}"
                                                    class="btn btn-icon btn-info"
                                                    title="@lang('company::attributes.companies_chart')">
                                                    <i class="fas fa-bars"></i>
                                                </a>
                                                <a href="{{route('admin.companies.employees.index', $company)}}"
                                                    class="btn btn-icon btn-dark"
                                                    title="@lang('company::attributes.company_employees')">
                                                    <i class="fas fa-users"></i>
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