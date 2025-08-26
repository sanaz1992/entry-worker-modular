<div class="p-6 bg-white">
    <h2 class="text-2xl font-bold mb-4">{{ __('acl::attributes.create') }}</h2>
    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif
    @if ($message)
        <div class="mb-4 text-green-600">{{ $message }}</div>
    @endif
    <form wire:submit="store">
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('acl::attributes.title') }}:</label>
            <input type="text" wire:model.defer="form.title" class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.title')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label
                class="block mb-1 text-sm">{{ __('acl::attributes.name') }}:({{ __('acl::attributes.english') }})</label>
            <input type="text" wire:model.defer="form.name" class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{ __('acl::attributes.permissions') }}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                @foreach ($permissions as $permission)
                    <label class="flex items-center" for="{{ $permission->id }}">
                        <input type="checkbox" wire:model="form.selectedPermissions" id="{{ $permission->id }}"
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
            {{ __('acl::attributes.store') }}
        </button>
    </form>
</div>