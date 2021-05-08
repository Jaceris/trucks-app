<?php

namespace App\Http\Controllers;

use App\Forms\TruckForm;
use App\Models\Truck;
use App\Services\TruckFilter;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TruckFilter $truckFilter, Request $request)
    {
        return view('truck.index')->with([
           'trucks' => $truckFilter($request)->paginate(20),
           'brands' => config('truck.brands'),
           'sorts'  => config('truck.sorts')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(TruckForm::class, [
            'method' => 'POST',
            'url'    => route('truck.store')
        ]);
      
        return view('truck.create')->with([
           'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder, Request $request)
    {
       $form = $formBuilder->create(TruckForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Truck::create($form->getFieldValues());

        session()->flash('message', __('Truck created successfully!'));
        
        return redirect()->route("truck.index");
    }
}
