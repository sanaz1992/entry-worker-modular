<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('user::attributes.users_list')}}</h4>
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
                                        <th>{{__('user::attributes.avatar')}}</th>
                                        <th>{{__('user::attributes.fname')}}</th>
                                        <th>{{__('user::attributes.lname')}}</th>
                                        <th>{{__('user::attributes.mobile')}}</th>
                                        <th>{{__('user::attributes.created_at')}}</th>
                                        <th>{{__('user::attributes.actions')}}</th>
                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <img alt="{{$user->name}}" class="mr-3 rounded-circle" width="40"
                                                    src="{{ $user->avatar?->getThumbnailUrl('small') }}">
                                            </td>
                                            <td>{{$user->fname}}</td>
                                            <td>{{$user->lname}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>{{$user->created_at_jalali}}</td>
                                            <td>
                                                <a href="{{route('admin.users.show', $user)}}"
                                                    class="btn btn-icon btn-success"><i class="far fa-eye"></i></a>
                                                <a href="{{route('admin.users.edit', $user)}}"
                                                    class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
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