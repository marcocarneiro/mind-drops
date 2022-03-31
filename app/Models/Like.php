<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    //campos "preenchíveis"
    protected $fillable = ['user_id','drop_id'];

    //Relacionamento com a tabela de usuários
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacionamento com a tabela de drops
    public function drop()
    {
        return $this->belongsTo(Drop::class);
    }

}
