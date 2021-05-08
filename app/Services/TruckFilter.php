<?php

namespace App\Services;

use App\Models\Truck;
use Illuminate\Http\Request;

class TruckFilter
{
    /**
     * Filter and sort trucks
     *
     * @return App\Models\Truck
     */
    public function apply(Request $filters)
    {
        $query = Truck::query();

        // Search truck by brand
        if ($filters->input('brand')) {
            $query->where('brand', $filters->input('brand'));
        }

        // Search by min production years
        if ($filters->input('year_from')) {
            $query->where('year', '>=', $filters->input('year_from'));
        }
        
        // Search by max production years
        if ($filters->input('year_to')) {
            $query->where('year', '<=', $filters->input('year_to'));
        }

        // Search truck owner
        if ($filters->input('owner')) {
            $query->where('owner', 'like', '%'.$filters->input('owner').'%');
        }

        // Search by min owners count
        if ($filters->input('owners_count_from')) {
            $query->where('owners_count', '>=', $filters->input('owners_count_from'));
        }

        // Search by max owners count
        if ($filters->input('owners_count_to')) {
            $query->where('owners_count', '<=', $filters->input('owners_count_to'));
        }

        // Sort by
        if ($filters->input('sortBy') && $filters->input('sortType')) {
            $query->orderBy($filters->input('sortBy'), $filters->input('sortType'));
        }

        return $query;
    }
}
