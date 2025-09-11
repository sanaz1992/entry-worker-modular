<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\Entities\Media;
use Modules\User\Entities\User;

// use Modules\User\Database\Factories\AddressFactory;

class CompanyEmployee extends Model
{
    use SoftDeletes;
    protected $table = 'company_employee';
    protected $fillable = ['company_id', 'employee_is', 'shift_id', 'chart_id', 'user_id'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
    public function chart(): BelongsTo
    {
        return $this->belongsTo(Chart::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
