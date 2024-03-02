<?php

namespace App\Actions\RiskOwner;

use App\Models\RiskOwner;
use Illuminate\Support\Facades\Validator;

class CreateNewRiskOwner
{
    public function create($input)
    {
        $validator =  Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:risk_owners'],
            'role' => ['required', 'string', 'max:255'],
        ])->validate();

        RiskOwner::create($validator);
    }
}
