<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    public function render()
    {
        return view('livewire.roles',[
            'roles'=>Role::all()
        ]);
    }
}
