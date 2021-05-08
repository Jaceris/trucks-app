<?php

namespace App\Services;

use App\Models\Truck;
use Illuminate\Http\Request;

class TruckFilter
{
    /**
     * Filter and sort trucks
     *
     * @return App\Models\Truck query
     */
    public function __invoke(Request $filters)
    {
        $query = Truck::query();

        // Search truck by brand
        if (!is_null($filters->input('brand'))) {
            $query->ofBrand($filters->input('brand'));
        }
        
        // Search by min production years
        if ($filters->input('year_from') || $filters->input('year_to')) {
            $query->ofBetweenYear($filters->input('year_from'), $filters->input('year_to'));
        }

        // // Search by truck owner
        if ($filters->input('owner')) {
            $query->ofOwner($filters->input('owner'));
        }

        // // Search by owners count
        if ($filters->input('owners_count_from') || $filters->input('owners_count_to')) {
            $query->ofBetweenOwnersCount($filters->input('owners_count_from'), $filters->input('owners_count_to'));
        }

        // // Sort by
        if ($filters->input('sort_by') && $filters->input('sort_type')) {
            $query->orderBy($filters->input('sort_by'), $filters->input('sort_type'));
        }

        return $query;
    }
}
