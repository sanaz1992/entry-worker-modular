<?php

namespace Modules\Company\External\Repositories;

use Modules\Company\Entities\Company;
use Modules\Company\External\Repositories\Contract\CompanyRepositoryInterface;
use Modules\Core\External\Repositories\BaseRepository;
use Modules\Core\Helpers\SlugHelper;

class CompanyRepository extends BaseRepository implements CompanyRepositoryInterface
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function create(array $data): Company
    {
        return Company::create([
            'title'        => $data['title'],
            'slug' => SlugHelper::generate(get_class(new Company()), $data['title']),
            'manager_id' => $data['manager_id'],
        ]);
    }

    public function update(Company $company, array $data): Company
    {
        $company->update([
            'title' => $data['title'],
            'manager_id'  => $data['manager_id'],
        ]);
        return $company;
    }

    public function addEmployee(Company $company, array $data): void
    {
        $company->employees()->attach(
            $data['user_id'],
            ['chart_id' => $data['chart_id']]
        );
    }

    public function deleteEmployee(Company $company, int $userId):void
    {
        $company->employees()->detach($userId);
    }
}
