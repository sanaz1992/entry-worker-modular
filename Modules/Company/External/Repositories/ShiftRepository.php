<?php

namespace Modules\Company\External\Repositories;

use Modules\Company\Entities\Shift;
use Modules\Company\External\Repositories\Contract\ShiftRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;

class ShiftRepository extends BaseRepository implements ShiftRepositoryInterface
{
    public function __construct(Shift $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Shift
    {
        return Shift::create([
            'title' => $data['title'],
            'company_id' => $data['company_id'],
            'is_night' => $data['is_night'] ?? false
        ]);
    }

    public function update(Shift $shift, array $data): Shift
    {
        $shift->update([
            'title' => $data['title'],
            'is_night' => $data['end_time'] ?? false
        ]);
        return $shift;
    }
}
