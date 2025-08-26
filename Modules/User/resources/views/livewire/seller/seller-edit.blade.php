<div class="p-6 bg-white">
    <h2 class="text-2xl font-bold mb-4">{{ __('user::attributes.edit') }} {{$user->name}}</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif
    @if ($message)
        <div class="mb-4 text-green-600">{{ $message }}</div>
    @endif
    <form wire:submit="update">
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

            @if (isset($form['image']) && is_object($form['image']) && method_exists($form['image'], 'temporaryUrl'))
                <img src="{{ $form['image']->temporaryUrl() }}" class="w-20 rounded mt-2">
            @else
                <img src="{{ $user->avatar?->getThumbnailUrl('small') }}" class="w-20 rounded mt-2">
            @endif
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{__('user::attributes.province')}}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                <select wire:model="form.province_id" wire:change="provinceChanged">
                    <option value="">{{__('user::messages.select_one_item')}}</option>
                    @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('form.province_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm font-medium">{{__('user::attributes.city')}}:</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2 text-sm">
                <select wire:model="form.city_id">
                    <option value="">{{__('user::messages.select_one_item')}}</option>
                    @foreach ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('form.city_id')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.address') }} : </label>
            <input type="text" wire:model.defer="form.address"
                class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.address')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 text-sm">{{ __('user::attributes.postal_code') }} : </label>
            <input type="text" wire:model.defer="form.postal_code"
                class="border border-gray-300 rounded px-3 py-1 w-full" />
            @error('form.postal_code')
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

        <div wire:loading wire:target="form.image">{{ __('user::messages.image.uploading') }}</div>
        <button type="submit" wire:loading.attr="disabled" wire:target="form.image"
            class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-700">
            {{ __('user::attributes.store') }}
        </button>
    </form>
</div>