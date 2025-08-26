<div class="p-6 bg-white">
    <h2 class="text-2xl font-semibold mb-4">{{ __('acl::attributes.list') }}</h2>
    <div class=" m-3">
        <a href="{{ route('admin.roles.create') }}"
            class="bg-blue-700 text-white px-3 py-1 rounded ">{{ __('acl::attributes.create') }} </a>
    </div>
    <table class="w-full border border-gray-300 text-sm text-right">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">{{ __('acl::attributes.title') }} </th>
                <th class="px-4 py-2">{{ __('acl::attributes.permissions') }} </th>
                <th class="px-4 py-2">{{ __('acl::attributes.actions') }} </th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $role)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $role->id }}</td>
                    <td class="px-4 py-2">{{ $role->title }}</td>
                    <td class="px-4 py-2 text-xs text-gray-700">
                        {{ $role->permissions->pluck('title')->join(', ') }}
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.roles.edit', $role) }}"
                            class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">{{ __('acl::attributes.edit') }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                        {{ __('acl::messages.without_permission') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $roles->links() }}
</div>