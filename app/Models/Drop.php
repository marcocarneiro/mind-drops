<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    use HasFactory;

    //campos "preenchíveis"
    protected $fillable=['content', 'user_id'];

    //Relacionamento com a tabela de usuários
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacionamento com a tabela de likes
    public function likes()
    {
        //retorna as curtidas apenas do usuário autenticado - se estiver autenticado
        return $this->hasMany(Like::class)->where(function($query){
            if(auth()->check()){
                $query->where('user_id', auth()->user()->id);
            }
        });
    }
}
