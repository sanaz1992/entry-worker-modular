<?php

namespace Modules\Core\External\Repositories\Contract;

interface BaseRepositoryInterface
{
        public function all(string $orderBy = null, array $limit = [], array $with = [], array $conditions = []);
        public function find(int $id);
        public function delete(int $id);
}
