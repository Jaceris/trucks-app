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
     * @param  Request $request
     * @param  TruckFilter $truckFilter
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
     * @param  TruckFilterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function filter(TruckFilterRequest $request)
    {
        return redirect()->route('truck.index', $request->all());
    }

    /**
     * @param FormBuilder $formBuilder
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
     * @param  FormBuilder $formBuilder
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
