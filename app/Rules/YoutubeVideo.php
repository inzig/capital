<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YoutubeVideo implements Rule
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
        return starts_with($value, ['http://www.youtube.com/embed/', 'https://www.youtube.com/embed/']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a Youtube video embed URL.';
    }
}
