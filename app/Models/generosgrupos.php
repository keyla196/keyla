<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class generosgrupos
 * @package App\Models
 * @version March 5, 2020, 7:43 pm UTC
 *
 * @property integer idgrupo
 * @property integer idgenero
 */
class generosgrupos extends Model
{

    public $table = 'generosgrupos';
    



    public $fillable = [
        'idgrupo',
        'idgenero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idgrupo' => 'integer',
        'idgenero' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
