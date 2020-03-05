<?php

namespace App\Repositories;

use App\Models\generosgrupos;
use App\Repositories\BaseRepository;

/**
 * Class generosgruposRepository
 * @package App\Repositories
 * @version March 5, 2020, 7:43 pm UTC
*/

class generosgruposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idgrupo',
        'idgenero'
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
        return generosgrupos::class;
    }
}
