<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class generosgrupos
 * @package App\Models
 * @version March 5, 2020, 8:03 pm UTC
 *
 * @property integer idgrupos
 * @property integer idgenero
 */
class generosgrupos extends Model
{

    public $table = 'generosgrupos';
    



    public $fillable = [
        'idgrupos',
        'idgenero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idgrupos' => 'integer',
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
