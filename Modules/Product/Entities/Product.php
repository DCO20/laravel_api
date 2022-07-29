<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\Category;

class Product extends Model
{
    use SoftDeletes;

    /**
     * Tabela do banco de dados
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'price',
        'active',
        'description',

    ];

    /**
     * Atributos da tabela do banco de dados
     *
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
    ];

    /**
     * Atributos da tabela do banco de dados
     *
     *  @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    |
    | Definição dos métodos das entidades relacionadas.
    | Estes métodos são responsáveis pelas relações e permitem acessar
    | os atributos Eloquent obtidas das mesmas.
    |
    */

    /**
     * Obtém a categoria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }
}
