<?php

namespace App\Repositories;

use App\Models\musicogrupos;
use App\Repositories\BaseRepository;

/**
 * Class musicogruposRepository
 * @package App\Repositories
 * @version March 5, 2020, 7:56 pm UTC
*/

class musicogruposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idgrupo',
        'idmusico',
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
        return musicogrupos::class;
    }
}
