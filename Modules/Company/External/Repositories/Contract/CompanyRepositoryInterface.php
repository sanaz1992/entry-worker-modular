<?php

namespace Modules\Company\External\Repositories\Contract;

use Modules\Company\Entities\Company;
use Modules\Core\External\Repositories\Contract\BaseRepositoryInterface;

interface CompanyRepositoryInterface extends BaseRepositoryInterface
{
    public function create(array $data): Company;
    public function update(Company $company, array $data): Company;
    public function addEmployee(Company $company, array $data): void;
    public function deleteEmployee(Company $company, int $userId): void;
}
