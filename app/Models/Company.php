<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'nip',
        'active',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    protected static function booted()
    {
        static::deleted(function ($company) {
            $company->services()->delete();
        });

        static::restored(function ($company) {
            $company->services()->withTrashed()->restore();
        });
    }
}
