<?php

namespace App\Livewire\RiskOwner;

use App\Actions\RiskOwner\UpdateRiskOwner;
use App\Models\RiskOwner;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexRiskOwner extends Component
{
    public string $search = '';

    public $riskOwnerIdBeingRemoved = null;
    public $riskOwnerIdBeingEdited = null;
    public $riskOwnerIdBeingView = null;

    public bool $confirmingRiskOwnerRemoval = false;
    public bool $confirmingRiskOwnerEdit = false;
    public bool $confirmingRiskOwnerView = false;

    public array $state = [
        'name' => '',
        'title' => 'Mr',
        'email' => '',
        'role' => 'Owner'
    ];

    public $viewingRiskOwner;

    public function confirmRiskOwnerRemoval($riskOwnerId)
    {
        $this->confirmingRiskOwnerRemoval = true;

        $this->riskOwnerIdBeingRemoved = $riskOwnerId;
    }

    public function confirmRiskOwnerEdit($riskOwnerId)
    {
        $this->confirmingRiskOwnerEdit = true;

        $this->riskOwnerIdBeingEdited = $riskOwnerId;

        $this->state = RiskOwner::findOrFail($riskOwnerId)->toArray();
    }

    public function confirmRiskOwnerView($riskOwnerId)
    {
        $this->confirmingRiskOwnerView = true;

        $this->riskOwnerIdBeingView = $riskOwnerId;

        $this->viewingRiskOwner = RiskOwner::findOrFail($riskOwnerId);
    }

    public function updateRiskOwner(UpdateRiskOwner $updater)
    {
        $updater->update($this->state, RiskOwner::findOrFail($this->riskOwnerIdBeingEdited));

        $this->reset('state','confirmingRiskOwnerEdit');
    }

    public function deleteRiskOwner()
    {
        RiskOwner::findOrFail($this->riskOwnerIdBeingRemoved)->delete();

        $this->confirmingRiskOwnerRemoval = false;
    }



    #[On('refresh')]
    public function render()
    {
        return view('livewire.risk-owner.index-risk-owner', [
            'riskOwners' => RiskOwner::where('name', 'like', '%'.$this->search.'%')->get()
        ]);
    }
}
