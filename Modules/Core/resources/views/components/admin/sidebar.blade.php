{{-- {{Vite::asset('resources/assets/images/logo.webp')}} --}}
<aside :class="sidebarOpen ? 'block' : 'hidden'"
    class="absolute z-50 md:sticky md:top-8 md:h-[calc(100vh-12rem)] top-[100px] left-0 bg-white w-64 shadow-box rounded-2xl p-4 space-y-2 md:block transition-all">
    <div class="flex flex-col gap-6 h-full">
        <div class="flex items-center gap-2 border-b border-black/10 pb-6">
            <div class="w-12 h-12 rounded-full bg-gray-200"></div>
            <div class="flex flex-col gap-2">
                <p class="text-sm font-semibold">نام کاربر</p>
                <p class="text-xs text-black/60">0999999999</p>
            </div>
        </div>
        <!-- تب داشبورد -->
        <a href="{{route('admin.dashboard')}}" class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
            {{request()->routeIs('admin.dashboard') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
            <img src="{{ asset('build/images/icons/sidebar/home.svg') }}"
                class="w-5 h-5 {{request()->routeIs('admin.dashboard') ? 'invert' : ''}}" alt="داشبورد" />
            داشبورد
        </a>
        @can('sellers_list')
            <!-- تب نمایندگان -->
            <a href="{{ route('admin.sellers.index') }}"
                class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium 
                                                                             {{request()->routeIs('admin.sellers.index') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
                <img src="{{ asset('build/images/icons/sidebar/personalcard.svg') }}"
                    class="w-5 h-5 {{request()->routeIs('admin.sellers.index') ? 'invert' : ''}}" alt="نمایندگان" />
                نمایندگان
            </a>
        @endcan
        {{-- @can('categories_list')
            <a href="{{route('admin.categories.index')}}"
                class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
                                                     {{request()->routeIs('admin.categories.index') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
                <img src="{{ asset('build/images/icons/sidebar/card-pos.svg') }}"
                    class="w-5 h-5 {{request()->routeIs('admin.categories.index') ? 'invert' : ''}}"
                    alt="گروهبندی محصولات" />
                گروهبندی محصولات
            </a>
        @endcan --}}
        @can('products_list')
            <a href="{{route('admin.products.index')}}"
                class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
                                                     {{request()->routeIs('admin.products.index') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
                <img src="{{ asset('build/images/icons/sidebar/card-pos.svg') }}"
                    class="w-5 h-5 {{request()->routeIs('admin.products.index') ? 'invert' : ''}}" alt="محصولات" />
                محصولات
            </a>
        @endcan
        <!-- تب اطلاع‌رسانی‌ها -->
        <a href="#"
            class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium  {{request()->routeIs('admin.dashboard') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
            <img src="{{ asset('build/images/icons/sidebar/notification.svg') }}"
                class="w-5 h-5 {{request()->routeIs('admin.dashboard') ? 'invert' : ''}}" alt="پیام‌ها و اخطارها" />
            پیام‌ها و اخطارها
        </a>

        <!-- تب تست -->
        <a href="#" class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
         {{request()->routeIs('admin.dashboard') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
            <img src="{{ asset('build/images/icons/sidebar/card-pos.svg') }}"
                class="w-5 h-5 {{request()->routeIs('admin.dashboard') ? 'invert' : ''}}" alt="تست و بررسی" />
            تست و بررسی
        </a>

        @can('admins_list')
            <a href="{{route('admin.admins.index')}}"
                class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
                                                     {{request()->routeIs('admin.admins.index') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
                <img src="{{ asset('build/images/icons/sidebar/card-pos.svg') }}"
                    class="w-5 h-5 {{request()->routeIs('admin.admins.index') ? 'invert' : ''}}" alt=" کاربران" />
                مدیران
            </a>
        @endcan
        @can('roles_list')
            <a href="{{route('admin.roles.index')}}"
                class="flex items-center gap-2 px-3 py-3 rounded-xl transition font-medium
                                                 {{request()->routeIs('admin.roles.index') ? 'bg-[#3E3E3B] text-white' : 'text-black hover:bg-gray-100'}}">
                <img src="{{ asset('build/images/icons/sidebar/card-pos.svg') }}"
                    class="w-5 h-5 {{request()->routeIs('admin.roles.index') ? 'invert' : ''}}" alt=" دسترسی ها" />
                دسترسی ها
            </a>
        @endcan
        <!-- خروج -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <button type="submit" class="flex items-center gap-2 px-3 py-3 rounded-xl transition mt-auto font-medium">
                <img src="{{ asset('build/images/icons/sidebar/logout.svg') }}" class="w-5 h-5 " alt="خروج" />
                خروج
            </button>

        </form>
    </div>
</aside>