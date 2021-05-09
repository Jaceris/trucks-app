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
     * @param  App\Services\TruckFilter;
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(TruckFilter $truckFilter, Request $request)
    {
        $request->flash();

        return view('truck.index')->with([
           'trucks' => $truckFilter($request)->paginate(config('app.pages')),
           'brands' => config('truck.brands'),
           'sorts'  => config('truck.sorts')
        ]);
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
     * @param  \Illuminate\Http\Request
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
