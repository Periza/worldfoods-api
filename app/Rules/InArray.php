<?php

namespace App\Rules;

use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Rule;

class InArray implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return(in_array($value, Config::get('translatable.locales')));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Languange not supported.';
    }
}
