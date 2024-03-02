<?php

namespace App\Actions\RiskOwner;

use App\Models\RiskOwner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateRiskOwner
{
    public function update($input, RiskOwner $riskOwner)
    {
        $validator =  Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('risk_owners')->ignore($riskOwner->id)],
            'role' => ['required', 'string', 'max:255'],
        ])->validate();

        $riskOwner->update($validator);
    }
}
