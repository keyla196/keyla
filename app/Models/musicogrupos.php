<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class musicogrupos
 * @package App\Models
 * @version March 5, 2020, 7:56 pm UTC
 *
 * @property integer idgrupo
 * @property integer idmusico
 * @property string instrumento
 * @property string fechanacimiento
 * @property string fechamuerte
 */
class musicogrupos extends Model
{

    public $table = 'musicogrupos';
    



    public $fillable = [
        'idgrupo',
        'idmusico',
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
        'idgrupo' => 'integer',
        'idmusico' => 'integer',
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
