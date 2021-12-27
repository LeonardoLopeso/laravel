<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    // use HasFactory;

    function informacoes_sobre_o_elequent() {

        // comportamentos default do Eloquent
        // assume os comportamento defualt de um BD como por exemplo..
        // as variáveis a baixo altera o comportamento defualt do DB

        // protected $table = 'tarefas'; // identifica o noma da tabela assumindo que é o mesmo nome desta class
        // protected $primaryKey = 'id'; // identifica que a primary key é donominado id
        // public $incrementing = false; // identifica que a primary key é auto incremente
        // protected $keyType = 'string'; // assume que sua primary key é do tipo int

        // assume que os campos created_at, updated_at existem e atribui valores date automaticamente
        // public $timestamps = false;

        // const CREATED_AT = 'date_created'; // permitindo o campo created_at do Eloquent e alterando para o nome da minha tabela
        // const UPDATED_AT = 'date_updated'; // permitindo o campo updated_at do Eloquent e alterando para o nome da minha tabela

    }

    public $timestamps = false;

    // para ativar a atualização em masssa / para pegar o id e atualizar numa única linha
    // ou quanto o update não sabe o comando anterior
    // exemplo do editAction do TarefasController: Tarefa::find($id)->update(['titulo'=>$titulo]);
    // ativação abaixo do array fillable
    // colocando os dados que poderão ser alterados em massa
    protected $fillable = [ 'titulo' ];
}
