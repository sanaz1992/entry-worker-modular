<?php

namespace Modules\User\External\Repositories;

use Illuminate\Support\Facades\Hash;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\User\Entities\Address;
use Modules\User\Entities\User;
use Modules\User\External\Repositories\Contract\AddressRepositoryInterface;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    public function __construct(Address $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Address
    {
        return Address::create([
            'user_id' => $data['user_id'],
            'type' => $data['type'],
            'city_id' => $data['city_id'],
            'address' => $data['address'],
            'postal_code' => $data['postal_code']
        ]);
    }

    public function update(Address $address, array $data): Address
    {
        $address->city_id = $data['city_id'];
        $address->address = $data['address'];
        $address->postal_code = $data['postal_code'];
        $address->save();
        return $address;
    }
}
