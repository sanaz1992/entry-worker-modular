<div class="p-6 bg-white">
    <h2 class="text-2xl font-bold mb-4">{{ __('acl::attributes.permissions_with_username') }} {{ $user->name }}</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif
    @if ($message)
        <div class="mb-4 text-green-600">{{ $message }}</div>
    @endif
    <form wire:submit="update">
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{ __('acl::attributes.roles') }}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                @foreach ($roles as $role)
                    <label class="flex items-center" for="level_{{ $role->name }}">
                        <input type="checkbox" wire:model="form.selectedRoles" id="level_{{ $role->name }}"
                            value="{{ $role->name }}" class="mr-2" />
                        {{ $role->title }}
                    </label>
                @endforeach
            </div>
            @error('form.selectedRoles')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{ __('acl::attributes.permissions') }}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                @foreach ($permissions as $permission)
                    <label class="flex items-center" for="level_{{ $permission->name }}">
                        <input type="checkbox" wire:model="form.selectedPermissions" id="level_{{ $permission->name }}"
                            value="{{ $permission->name }}" class="mr-2" />
                        {{ $permission->title }}
                    </label>
                @endforeach
            </div>
            @error('form.selectedPermissions')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" wire:loading.attr="disabled" wire:target="form.image"
            class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">
            {{ __('acl::attributes.update') }}
        </button>
    </form>
</div>