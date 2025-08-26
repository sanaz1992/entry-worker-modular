<div>
    <!-- Top Boxes -->
    <section>
        <div>
            @include('dashboard::components.dashboard-top-boxes')
        </div>

    </section>

    <!-- Dashboard Orders -->
    <section class="bg-white p-4 md:p-6 rounded-xl shadow-box mt-6 overflow-x-auto">
        <h2 class="font-semibold text-lg md:text-xl mb-4 md:mb-6">سفارشات مجموعه</h2>
        <div>
            @include('dashboard::components.dashboard-orders-table')
        </div>
    </section>

   
</div>