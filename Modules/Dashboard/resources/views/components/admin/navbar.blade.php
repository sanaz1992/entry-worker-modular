<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                    <i data-feather="maximize"></i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li>
            <a href="{{route('admin.attendances.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>
                @lang('company::attributes.attendance_create')
            </a>
        </li>
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">
                    6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    پیام ها
                    <div class="float-right">
                        <a href="#">خوانده شده</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">جان</span>
                            <span class="time messege-text">لطفا ایمیل منو چک کنید.</span>
                            <span class="time">2 دقیقه قبل</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">سارا</span>
                            <span class="time messege-text">درخواست برای نرم افزار</span>
                            <span class="time">5 دقیقه قبل</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">محمد</span>
                            <span class="time messege-text">پرداخت فاکتور برنامه.</span> <span class="time">12 دقیقه
                                قبل</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">لینا</span>
                            <span class="time messege-text">سلام جان.من برای شما یک تسک گذاشته ام.</span>
                            <span class="time">30 دقیقه قبل</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                            <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                        </span> <span class="dropdown-item-desc"> <span class="message-user">نیلوفر</span>
                            <span class="time messege-text">لورم ایپسوم متن ساختگی با تولید سادگی .</span>
                            <span class="time">1 دقیقه قبل</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">مشاهده همه <i class="fas fa-chevron-left"></i></a>
                </div>
            </div>
        </li> --}}
        {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
                <span class="badge headerBadge2">
                    3 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    اطلاعیه
                    <div class="float-right">
                        <a href="#">خوانده شده</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread"> <span
                            class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                        </span> <span class="dropdown-item-desc">به روزرسانی الگو اکنون در دسترس است! <span
                                class="time">2 دقیقه پیش</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i
                                class="far
												fa-user"></i>
                        </span> <span class="dropdown-item-desc"> <b>شما</b> و <b>نیلوفر</b> اکنون <span class="time">10
                                ساعت</span> با هم دوست هستید<span class="time"></span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                                class="fas
												fa-check"></i>
                        </span> <span class="dropdown-item-desc"> <b>محمد</b> وظیفه <b>باگ هدر را</b> به
                            <b>موفقیت </b> <span class="time">12 ساعت قبل منتقل کرده است</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                                class="fas fa-exclamation-triangle"></i>
                        </span> <span class="dropdown-item-desc">کمبود میزان حافظه. بیایید آن را تمیز کنیم!
                            <span class="time">17 ساعت قبل</span>
                        </span>
                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i
                                class="fas
												fa-bell"></i>
                        </span> <span class="dropdown-item-desc">به الگوی اجیس خوش آمدید! <span
                                class="time">دیروز</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">مشاهده همه <i class="fas fa-chevron-left"></i></a>
                </div>
            </div>
        </li> --}}
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt=" @lang('dashboard::attributes.image')" src="{{asset('assets/images/user-1.png')}}"
                    class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{auth()->user()->full_name}}</div>
                <a href="profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> @lang('dashboard::attributes.profile')
                </a>

                <div class="dropdown-divider"></div>
                <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i
                        class="fas fa-sign-out-alt"></i>
                    @lang('dashboard::attributes.logout')
                </a>
            </div>
        </li>
    </ul>
</nav>