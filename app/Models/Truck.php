<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Truck extends Model
{
    use HasFactory;

    /**
     * @param int $value
     * @return string|null
     */
    public function getBrandAttribute(int $value)
    {
        return Arr::get(config('truck.brands'), $value);
    }
}
