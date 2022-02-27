<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poems extends Model
{
    protected $table = 'poems';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static $rules = array(
        'imagem' => array(),
        'titulo' => array(),
        'conteudo' => array()
    );

    public static $rules_u = array(
        'imagem' => array(),
        'titulo' => array(),
        'conteudo' => array()
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imagem', 'titulo', 'conteudo',
    ];
}
