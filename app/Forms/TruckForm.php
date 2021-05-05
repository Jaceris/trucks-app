<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('brand', 'number')
            ->add('year', 'number')
            ->add('owner', 'text')
            ->add('owners_count', 'number')
            ->add('comments', 'textarea');
    }
}
