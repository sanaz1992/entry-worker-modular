<?php

namespace Modules\Core\External\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;
use Modules\Core\Helpers\ConvertDatesHelper;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    //  condition format
    //  $conditions = [
    //         'where' => ['warehouse_id' => ['=', $this->warehouse->id]],
    //     ];
    public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = [])
    {
        $query = $this->model->query();

        // Soft Deletes
        if (! empty($conditions['trashed'])) {
            if ($conditions['trashed'] === 'only') {
                $query = $query->onlyTrashed();
            } elseif ($conditions['trashed'] === 'with') {
                $query = $query->withTrashed();
            }
        }

        if (! empty($with)) {
            $query = $query->with($with);
        }
        if (! empty($conditions['where'])) {
            foreach ($conditions['where'] as $col => $val) {
                if ($val[0] == "LIKE") {
                    $val[1] = '%' . $val[1] . '%';
                }
                $query = $query->where($col, $val[0], $val[1]);
            }
        }
        if (! empty($conditions['whereIn'])) {
            foreach ($conditions['whereIn'] as $col => $val) {
                $query = $query->whereIn($col, $val[0]);
            }
        }
        if (! empty($conditions['orWhere'])) {
            foreach ($conditions['orWhere'] as $col => $val) {
                $query = $query->orWhere($col, $val[0], $val[1]);
            }
        }
        if (! empty($conditions['whereNull'])) {
            foreach ($conditions['whereNull'] as $col => $val) {
                if ($val) {
                    $query = $query->whereNull($col);
                } else {
                    $query = $query->whereNotNull($col);
                }
            }
        }
        if (! empty($conditions['whereHas'])) {
            foreach ($conditions['whereHas'] as $relation => $callback) {
                $query = $query->whereHas($relation, $callback);
            }
        }
        if (! empty($conditions['orWhereHas'])) {
            foreach ($conditions['orWhereHas'] as $relation => $callback) {
                $query = $query->whereHas($relation, $callback);
            }
        }
        if (! empty($conditions['whereBetween'])) {
            foreach ($conditions['whereBetween'] as $col => $val) {
                if (isset($val[0]) && isset($val[1])) {
                    $query = $query->whereBetween($col, $val);
                } else {
                    if ($val[0] != null) {
                        $query = $query->where($col, '>=', $val[0]);
                    }
                    if ($val[1] != null) {
                        $query = $query->where($col, '<=', $val[1]);
                    }
                }
            }
        }
        if ($orderBy) {
            $orderBy = explode(':', $orderBy);
            if (is_array($orderBy)) {
                $query->orderBy($orderBy[0], $orderBy[1] ?? 'desc');
            } else {
                $query->orderBy($orderBy, 'desc');
            }
        } else {
            $query = $query->latest();
        }
        if (! empty($limit)) {
            if ($limit[1]) {
                $query = $query->paginate($limit[0]);
            } else {
                $query = $query->limit($limit[0])->get();
            }
        } else {
            $query = $query->get();
        }
        return $query;
    }

    public function checkConditions($condition, $query)
    {
        $type = $condition[0];

        switch ($type) {
            case 'where':
                // ['where', 'column', 'value'] یا ['where', 'column', 'operator', 'value']
                if (count($condition) == 3) {
                    $query->where($condition[1], $condition[2]);
                } elseif (count($condition) == 4) {
                    if ($condition[2] == "like") {
                        $query->where($condition[1], $condition[2], '%' . $condition[3] . '%');
                    } else {
                        $query->where($condition[1], $condition[2], $condition[3]);
                    }
                }
                break;

            case 'whereIn':
                // ['whereIn', 'column', ['value1', 'value2']]
                $query->whereIn($condition[1], $condition[2]);
                break;

            case 'whereNotIn':
                $query->whereNotIn($condition[1], $condition[2]);
                break;

            case 'whereNull':
                $query->whereNull($condition[1]);
                break;

            case 'whereNotNull':
                $query->whereNotNull($condition[1]);
                break;
            case 'whereBetween':
                if ($condition[1] == "created_at" || $condition[1] == "updated_at") {
                    if ($condition[2][0]) {
                        $from = ConvertDatesHelper::jalaliToGregorian($condition[2][0]);
                        $query->where($condition[1], '>=', $from);
                    }
                    if ($condition[2][1]) {
                        $to = ConvertDatesHelper::jalaliToGregorian($condition[2][1]);
                        $query->where($condition[1], '<=', $to);
                    }
                } else {
                    if ($condition[2][0]) {
                        $query->where($condition[1], '>=', $condition[2][0]);
                    }
                    if ($condition[2][1]) {
                        $query->where($condition[1], '<=', $condition[2][1]);
                    }
                }
                break;
        }

        return $query;
    }

    public function find($id)
    {
        return $this->model->query()->where('id', $id)->first();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);
        if (! $item) {
            return false;
        }
        return $item->delete();
    }
}
