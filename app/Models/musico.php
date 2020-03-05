<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class musico
 * @package App\Models
 * @version March 5, 2020, 7:39 pm UTC
 *
 * @property string nombre
 * @property string apellido
 * @property string instrumento
 * @property string fechanacimiento
 * @property string fechamuerte
 */
class musico extends Model
{

    public $table = 'musico';
    



    public $fillable = [
        'nombre',
        'apellido',
        'instrumento',
        'fechanacimiento',
        'fechamuerte'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fechanacimiento' => 'date',
        'fechamuerte' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
