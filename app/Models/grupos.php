<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class grupos
 * @package App\Models
 * @version March 5, 2020, 7:36 pm UTC
 *
 * @property string nombre
 * @property string fechainicio
 * @property string fechafin
 */
class grupos extends Model
{

    public $table = 'grupos';
    



    public $fillable = [
        'nombre',
        'fechainicio',
        'fechafin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fechainicio' => 'date',
        'fechafin' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
