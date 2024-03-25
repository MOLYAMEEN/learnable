<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NameRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       //هنا يعني اذا عملنا في الكرييت نفس اسم التيست  يقبلهالاا  
        $value!='user'?  $fail('the '.$attribute.'   attriute must be test value '):'';
        }
        
    }

