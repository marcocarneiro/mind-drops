<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Drop;

class ShowDrops extends Component
{
    //Evita o reload da página ao usar paginação
    use WithPagination;
    
    public $content = 'Olá Mind Drops!';

    //validação
    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];
    
    public function render()
    {
        //Retorna os registros do usuário com paginação de 5
        $drops = Drop::with('user')->paginate(5);
        return view('livewire.show-drops', ['drops' => $drops]);
    }

    public function create()
    {
        $this->validate();
        Drop::create([
            'content' => $this->content,
            'user_id' => 1,
        ]);

        $this->content = '';
    }
}
