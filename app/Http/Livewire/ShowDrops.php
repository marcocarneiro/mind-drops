<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowDrops extends Component
{
    public $mensagem = 'Olá Mind Drops!';
    
    public function render()
    {
        return view('livewire.show-drops');
    }
}
