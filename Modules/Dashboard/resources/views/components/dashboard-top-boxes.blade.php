<div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full">
    <div class="p-4 flex items-center gap-4 bg-white rounded-xl shadow-box">
        <div class="flex items-center justify-center p-4 bg-[#20BF86] rounded-full">
            <img src="{{ asset('build/images/icons/dashboard/truck-tick.svg') }}" alt="" />
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex items-center gap-2 font-bold">
                <span>32</span>
                <span>سفارشات دریافت شده</span>
            </div>
            <span class="text-xs sm:text-sm text-gray-600">
                محصول در انتظار تایید
            </span>
        </div>
    </div>
    <div class="p-4 flex items-center gap-4 bg-white rounded-xl shadow-box">
        <div class="flex items-center justify-center p-4 bg-[#4A8CE7] rounded-full">
            <img src="{{ asset('build/images/icons/dashboard/box-time.svg') }}" alt="" />
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex items-center gap-2 font-bold">
                <span>24</span>
                <span>سفارش در انتظار تولید</span>
            </div>
            <span class="text-xs sm:text-sm text-gray-600">
                محصول در انتظار تولید
            </span>
        </div>
    </div>
    <div class="p-4 flex items-center gap-4 bg-white rounded-xl shadow-box">
        <div class="flex items-center justify-center p-4 bg-[#E5C60D] rounded-full">
            <img src="{{ asset('build/images/icons/dashboard/convert-3d-cube.svg') }}" alt="" />
        </div>
        <div class="flex flex-col gap-2">
            <div class="flex items-center gap-2 font-bold">
                <span>24</span>
                <span>سفارش در جریان تولید</span>
            </div>
            <span class="text-xs sm:text-sm text-gray-600"> محصول ارسال شده </span>
        </div>
    </div>
</div>