<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategenerosgruposAPIRequest;
use App\Http\Requests\API\UpdategenerosgruposAPIRequest;
use App\Models\generosgrupos;
use App\Repositories\generosgruposRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class generosgruposController
 * @package App\Http\Controllers\API
 */

class generosgruposAPIController extends AppBaseController
{
    /** @var  generosgruposRepository */
    private $generosgruposRepository;

    public function __construct(generosgruposRepository $generosgruposRepo)
    {
        $this->generosgruposRepository = $generosgruposRepo;
    }

    /**
     * Display a listing of the generosgrupos.
     * GET|HEAD /generosgrupos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $generosgrupos = $this->generosgruposRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($generosgrupos->toArray(), 'Generosgrupos retrieved successfully');
    }

    /**
     * Store a newly created generosgrupos in storage.
     * POST /generosgrupos
     *
     * @param CreategenerosgruposAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategenerosgruposAPIRequest $request)
    {
        $input = $request->all();

        $generosgrupos = $this->generosgruposRepository->create($input);

        return $this->sendResponse($generosgrupos->toArray(), 'Generosgrupos saved successfully');
    }

    /**
     * Display the specified generosgrupos.
     * GET|HEAD /generosgrupos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var generosgrupos $generosgrupos */
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            return $this->sendError('Generosgrupos not found');
        }

        return $this->sendResponse($generosgrupos->toArray(), 'Generosgrupos retrieved successfully');
    }

    /**
     * Update the specified generosgrupos in storage.
     * PUT/PATCH /generosgrupos/{id}
     *
     * @param int $id
     * @param UpdategenerosgruposAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategenerosgruposAPIRequest $request)
    {
        $input = $request->all();

        /** @var generosgrupos $generosgrupos */
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            return $this->sendError('Generosgrupos not found');
        }

        $generosgrupos = $this->generosgruposRepository->update($input, $id);

        return $this->sendResponse($generosgrupos->toArray(), 'generosgrupos updated successfully');
    }

    /**
     * Remove the specified generosgrupos from storage.
     * DELETE /generosgrupos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var generosgrupos $generosgrupos */
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            return $this->sendError('Generosgrupos not found');
        }

        $generosgrupos->delete();

        return $this->sendSuccess('Generosgrupos deleted successfully');
    }
}
