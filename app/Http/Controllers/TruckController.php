<?php

namespace App\Http\Controllers;

use App\Forms\TruckForm;
use App\Http\Requests\TruckFilterRequest;
use App\Models\Truck;
use App\Services\TruckFilter;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class TruckController extends Controller
{
    /**
     * @param  Illuminate\Http\Request
     * @param  App\Services\TruckFilter;
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TruckFilter $truckFilter)
    {
        $request->flash();

        return view('truck.index')->with([
           'trucks' => $truckFilter($request)->paginate(config('app.pages')),
           'brands' => config('truck.brands'),
           'sorts'  => config('truck.sorts')
        ]);
    }

    /**
     * Validation for index filter
     * 
     * @param  \App\Http\Requests\TruckFilterRequest
     * @return \Illuminate\Http\Response
     */
    public function filter(TruckFilterRequest $request)
    {
        return redirect()->route('truck.index', $request->all());
    }

    /**
     * @param  Kris\LaravelFormBuilder\FormBuilder
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
     * @param  Kris\LaravelFormBuilder\FormBuilder
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder)
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
