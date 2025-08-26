<div class="overflow-x-auto">
    <div x-show="columns && columns.length > 0" class="overflow-hidden rounded-xl border border-black/10">
        <div class="overflow-x-auto">
            <table class="min-w-[800px] w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <template x-for="(col, index) in columns" :key="col.key">
                            <th class="px-4 py-2 sm:px-6 sm:py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                :style="col.width ? 'width: ' + col.width + ';' : ''" :class="{
                    'rounded-tr-lg': index === 0,
                    'rounded-tl-lg': index === columns.length - 1
                  }" x-text="col.label"></th>
                        </template>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <template x-for="(row, i) in rows" :key="i">
                        <tr class="hover:bg-gray-50" :class="{ 'bg-[#F6F6F5]': i % 2 === 0 }">
                            <template x-for="col in columns" :key="col.key">
                                <td class="px-4 py-3 text-sm sm:px-6 sm:py-4" :class="{ 
                      'px-3 py-1': col.key === 'status',
                      'text-gray-900': col.key !== 'status' || !statusConfig[row[col.key]]
                    }">
                                    <template x-if="col.key === 'status'">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-medium whitespace-nowrap"
                                            :class="{
                          'bg-green-50 text-green-600': (row.status === 'ارسال شده' || row._status === 'ارسال شده'),
                          'bg-[#F9F6ED] text-primary': (row.status === 'در حال تولید' || row._status === 'در حال تولید'),
                          'bg-red-50 text-red-600': (row.status === 'سفارش کنسل شده' || row._status === 'سفارش کنسل شده'),
                          'bg-[#FEFEE8] text-[#9E700A]': (row.status === 'سفارش باز' || row._status === 'سفارش باز'),
                          'bg-gray-100 text-gray-500': !row.status && !row._status
                        }" x-text="row.status || row._status || 'N/A'"></span>
                                    </template>
                                    <template x-if="col.key === 'actions'">
                                        <div class="flex justify-end relative">
                                            <button @click="row.showActions = !row.showActions"
                                                @click.away="row.showActions = false"
                                                class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                            <!-- منوی عملیات -->
                                            <div x-show="row.showActions" @click.away="row.showActions = false"
                                                class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-hard-sm z-50 border border-gray-200">
                                                <div class="">
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <i class="fas fa-eye ml-2"></i>
                                                        مشاهده جزئیات
                                                    </a>
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <i class="fas fa-edit ml-2"></i>
                                                        ویرایش
                                                    </a>
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                        <i class="fas fa-trash-alt ml-2"></i>
                                                        حذف
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="!['status', 'actions'].includes(col.key)">
                                        <span x-text="row[col.key] || ''"></span>
                                    </template>
                                </td>
                            </template>
                        </tr>
                    </template>
                    <tr x-show="!rows || rows.length === 0">
                        <td :colspan="columns ? columns.length : 1" class="px-6 py-4 text-center text-sm text-gray-500">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="!columns || columns.length === 0" class="text-xl md:text-2xl font-bold text-gray-800">
        Loading table data...
    </div>
</div>