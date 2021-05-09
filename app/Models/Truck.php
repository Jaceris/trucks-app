<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'year',
        'owner',
        'owners_count',
        'comments' 
    ];

    public function getBrandAttribute($value)
    {
        return Arr::get(config('truck.brands'), $value);
    }

    public function setOwnerAttribute($value)
    {
        return $this->attributes['owner'] = ucwords(strtolower($value));
    }

    public function scopeOfBrand($query, int $brand_id)
    {
        return $query->where('brand', $brand_id);
    }

    public function scopeOfOwner($query, string $owner_name)
    {
        return $query->where('owner', 'like', '%'.$owner_name.'%');
    }

    public function scopeOfBetweenYear($query, $year_from, $year_to)
    {
        $year_from = $year_from ?: config('truck.min_year');
        $year_to = $year_to ?: date('Y');
       
        return $query->whereBetween('year', [$year_from, $year_to]);
    }

    public function scopeOfBetweenOwnersCount($query, $count_from, $count_to)
    {
        $count_from = $count_from ?: 0;

        if(!$count_to) {
            return $query->where('owners_count', '>=', $count_from );
        }

        return $query->whereBetween('owners_count', [$count_from, $count_to]);
    }
}
