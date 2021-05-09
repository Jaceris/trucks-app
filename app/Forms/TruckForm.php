<?php

namespace App\Forms;

use App\Rules\AlphaSpaces;
use App\Rules\TwoOrMoreWords;
use Kris\LaravelFormBuilder\Form;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('brand', 'select', [
                'choices'     => config('truck.brands'),
                'empty_value' => __('Select truck brand'),
                'rules'       => [
                    'required', 
                    'integer'
                ],
            ])
            ->add('year', 'number', [
                'rules' => [
                    'required',
                    'integer', 
                    'min:'.config('truck.min_year'),
                    'max:' . date('Y')
                ],
            ])
            ->add('owner', 'text', [
                'rules' => [
                    new AlphaSpaces, 
                    new TwoOrMoreWords
                ],
            ])
            ->add('owners_count', 'number', [
                'rules' => [
                    'integer', 
                    'min:0', 
                    'nullable'
                ],
            ])
            ->add('comments', 'textarea', [
                'rules' => [
                    'string', 
                    'nullable'
                ],
            ])
            ->add('submit', 'submit', [
                'label' => __('Create new truck'),
            ]);
    }
}
