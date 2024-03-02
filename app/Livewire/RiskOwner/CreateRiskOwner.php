<?php

namespace App\Livewire\RiskOwner;

use App\Actions\RiskOwner\CreateNewRiskOwner;
use Livewire\Component;

class CreateRiskOwner extends Component
{
    public bool $openModal = false;

    public array $state = [
        'name' => '',
        'title' => 'Mr',
        'email' => '',
        'role' => 'Owner'
    ];


    public function create(CreateNewRiskOwner $creator)
    {
        $creator->create($this->state);

        $this->reset('state', 'openModal');

        $this->dispatch('refresh')->to(IndexRiskOwner::class);
    }

    public function render()
    {
        return view('livewire.risk-owner.create-risk-owner');
    }
}
