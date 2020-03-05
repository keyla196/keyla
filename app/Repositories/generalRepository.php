<?php

namespace App\Repositories;

use App\Models\general;
use App\Repositories\BaseRepository;

/**
 * Class generalRepository
 * @package App\Repositories
 * @version March 5, 2020, 7:31 pm UTC
*/

class generalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion'
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
        return general::class;
    }
}
