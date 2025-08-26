<div class="p-6 bg-white">

    <h2 class="text-2xl font-bold mb-4">{{ __('user::attributes.create') }}</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif
    @if ($message)
        <div class="mb-4 text-green-600">{{ $message }}</div>
    @endif

    <form wire:submit="store">
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.name') }}:</label>
            <input type="text" wire:model.defer="form.name" class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.avatar') }} :</label>
            <input type="file" wire:model="form.image">
            @error('form.image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            @if (isset($form['image']) && is_object($form['image']))
                <img src="{{ $form['image']->temporaryUrl() }}" class="w-20 rounded mt-2">
            @endif
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.mobile') }} : </label>
            <input type="text" wire:model.defer="form.mobile" class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.mobile')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.password') }} : </label>
            <input type="password" wire:model.defer="form.password"
                class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.password_confirmation') }} : </label>
            <input type="password" wire:model.defer="form.password_confirmation"
                class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.password_confirmation')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{ __('user::attributes.level') }}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                @foreach (\Modules\User\Enums\UserLevel::cases() as $level)
                    <label class="flex items-center" for="level_{{ $level->value }}">
                        <input type="radio" wire:model="form.level" id="level_{{ $level->value }}"
                            value="{{ $level->value }}" class="mr-2" />
                        {{ $level->label() }}
                    </label>
                @endforeach

            </div>
            @error('form.level')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div wire:loading wire:target="form.image">{{ __('core::messages.image.uploading') }}</div>
        <button type="submit" wire:loading.attr="disabled" wire:target="form.image"
            class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">
            {{ __('user::attributes.store') }}
        </button>
    </form>
</div>