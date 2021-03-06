<?php

namespace App\Repositories;

use App\Models\generosgrupos;
use App\Repositories\BaseRepository;

/**
 * Class generosgruposRepository
 * @package App\Repositories
 * @version March 5, 2020, 8:03 pm UTC
*/

class generosgruposRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idgrupos',
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
