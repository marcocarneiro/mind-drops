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
        //Retorna os registros do usuário com paginação de 5 - mais novos para antigos
        $drops = Drop::with('user')->latest()->paginate(5);
        return view('livewire.show-drops', ['drops' => $drops]);
    }

    public function show()
    {
        //Retorna os registros do usuário com paginação de 5 mais atuais - mais antigos
        $drops = Drop::with('user')->latest()->paginate(5);
        return view('livewire.show-drops', ['drops' => $drops]);
    }

    public function create()
    {
        $this->validate();
        
        //Insere o conteúdo de acordo com o relacionamento
        //definido do método drops() do model user 
        auth()->user()->drops()->create(
            [
                'content' => $this->content,
            ]
        );

        $this->content = '';
    }
}
