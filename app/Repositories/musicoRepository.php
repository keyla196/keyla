<?php

namespace App\Repositories;

use App\Models\musico;
use App\Repositories\BaseRepository;

/**
 * Class musicoRepository
 * @package App\Repositories
 * @version March 5, 2020, 7:39 pm UTC
*/

class musicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'instrumento',
        'fechanacimiento',
        'fechamuerte'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return musico::class;
    }
}
