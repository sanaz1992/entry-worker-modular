<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('company::attributes.company_employees')}} {{$company->title}}</h4>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>{{__('user::attributes.avatar')}}</th>
                                        <th>{{__('user::attributes.name')}}</th>
                                        <th>{{__('company::attributes.chart_title')}}</th>
                                        <th>{{__('company::attributes.created_at')}}</th>
                                    </tr>
                                    @foreach ($employees as $user)
                                        <tr>
                                            <td>
                                                <img alt="{{$user->name}}" class="mr-3 rounded-circle" width="40"
                                                    src="{{ $user->avatar?->getThumbnailUrl('small') }}">
                                            </td>
                                            <td>{{$user->full_name}}</td>
                                            <td>{{$user->charts->first()->title}}</td>
                                            <td>
                                                {{verta($user->charts->first()->pivot->created_at)->format('Y/m/d H:i')}}
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