<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TwoOrMoreWords implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count($value) >= 2;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('You must enter at least 2 words');
    }
}
