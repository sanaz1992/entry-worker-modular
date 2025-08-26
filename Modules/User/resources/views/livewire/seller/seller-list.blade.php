<section class="bg-white p-4 md:p-6 rounded-xl shadow-box mt-6 overflow-x-auto">
    <h2 class="font-semibold text-lg md:text-xl mb-4 md:mb-6">
        {{__('user::attributes.seller') }}
    </h2>

    <div class="overflow-hidden rounded-xl border border-black/10">
        <div class="overflow-x-auto">
            <table class="min-w-[800px] w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        @foreach ($columns as $col)
                            <th
                                class="px-4 py-2 sm:px-6 sm:py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{ $col['label'] }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $key => $user)
                        <tr class="hover:bg-gray-50 {{ $key % 2 === 0 ? 'bg-[#F6F6F5]' : '' }}">
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4">
                                <img alt="{{$user->name}}" class="h-10 w-10 rounded-full object-cover"
                                    src="{{ $user->avatar?->getThumbnailUrl('small') }}">
                            </td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4">
                                {{$user->name}}
                            </td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4">
                                {{$user->mobile}}
                            </td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4">
                                {{$user->addresses->first()->city->name}}
                            </td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4"></td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4"></td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4"></td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4"></td>
                            <td class="px-4 py-3 text-sm sm:px-6 sm:py-4">
                                <div class="flex justify-end relative" x-data="{ showActions: false }">
                                    <button @click="showActions = !showActions" @click.away="showActions = false"
                                        class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                        </svg>
                                    </button>
                                    <!-- منوی عملیات -->
                                    <div x-show="showActions" @click.away="showActions = false"
                                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-hard-sm z-50 border border-gray-200">
                                        <div class="">
                                            @can('sellers_show')
                                                <a href="{{route('admin.sellers.show', $user)}}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-eye ml-2"></i>
                                                    {{__('user::attributes.show_detail') }}
                                                </a>
                                            @endcan
                                            @can('sellers_edit')
                                                <a href="{{route('admin.sellers.edit', $user)}}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-edit ml-2"></i>
                                                    {{__('user::attributes.edit') }}
                                                </a>
                                            @endcan
                                            @can('sellers_delete')
                                                <button type="button"
                                                    onclick="if(confirm('آیا مطمئن هستید؟')) { @this.call('deleteItem', {{ $user->id }}) }"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                    <i class="fas fa-trash-alt ml-2"></i>
                                                    {{__('user::attributes.delete') }}
                                                </button>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) }}" class="px-6 py-4 text-center text-sm text-gray-500">
                                {{__('user::messages.without_item') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</section>