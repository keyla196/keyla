<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategruposAPIRequest;
use App\Http\Requests\API\UpdategruposAPIRequest;
use App\Models\grupos;
use App\Repositories\gruposRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class gruposController
 * @package App\Http\Controllers\API
 */

class gruposAPIController extends AppBaseController
{
    /** @var  gruposRepository */
    private $gruposRepository;

    public function __construct(gruposRepository $gruposRepo)
    {
        $this->gruposRepository = $gruposRepo;
    }

    /**
     * Display a listing of the grupos.
     * GET|HEAD /grupos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $grupos = $this->gruposRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($grupos->toArray(), 'Grupos retrieved successfully');
    }

    /**
     * Store a newly created grupos in storage.
     * POST /grupos
     *
     * @param CreategruposAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategruposAPIRequest $request)
    {
        $input = $request->all();

        $grupos = $this->gruposRepository->create($input);

        return $this->sendResponse($grupos->toArray(), 'Grupos saved successfully');
    }

    /**
     * Display the specified grupos.
     * GET|HEAD /grupos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var grupos $grupos */
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            return $this->sendError('Grupos not found');
        }

        return $this->sendResponse($grupos->toArray(), 'Grupos retrieved successfully');
    }

    /**
     * Update the specified grupos in storage.
     * PUT/PATCH /grupos/{id}
     *
     * @param int $id
     * @param UpdategruposAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategruposAPIRequest $request)
    {
        $input = $request->all();

        /** @var grupos $grupos */
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            return $this->sendError('Grupos not found');
        }

        $grupos = $this->gruposRepository->update($input, $id);

        return $this->sendResponse($grupos->toArray(), 'grupos updated successfully');
    }

    /**
     * Remove the specified grupos from storage.
     * DELETE /grupos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var grupos $grupos */
        $grupos = $this->gruposRepository->find($id);

        if (empty($grupos)) {
            return $this->sendError('Grupos not found');
        }

        $grupos->delete();

        return $this->sendSuccess('Grupos deleted successfully');
    }
}
