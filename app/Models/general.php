<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class general
 * @package App\Models
 * @version March 5, 2020, 7:31 pm UTC
 *
 * @property string descripcion
 */
class general extends Model
{

    public $table = 'general';
    



    public $fillable = [
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
