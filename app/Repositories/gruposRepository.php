<?php

namespace App\Repositories;

use App\Models\grupos;
use App\Repositories\BaseRepository;

/**
 * Class gruposRepository
 * @package App\Repositories
 * @version March 5, 2020, 7:36 pm UTC
*/

class gruposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'fechainicio',
        'fechafin'
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
        return grupos::class;
    }
}
