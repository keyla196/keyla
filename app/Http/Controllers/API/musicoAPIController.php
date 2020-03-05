<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemusicoAPIRequest;
use App\Http\Requests\API\UpdatemusicoAPIRequest;
use App\Models\musico;
use App\Repositories\musicoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class musicoController
 * @package App\Http\Controllers\API
 */

class musicoAPIController extends AppBaseController
{
    /** @var  musicoRepository */
    private $musicoRepository;

    public function __construct(musicoRepository $musicoRepo)
    {
        $this->musicoRepository = $musicoRepo;
    }

    /**
     * Display a listing of the musico.
     * GET|HEAD /musicos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $musicos = $this->musicoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($musicos->toArray(), 'Musicos retrieved successfully');
    }

    /**
     * Store a newly created musico in storage.
     * POST /musicos
     *
     * @param CreatemusicoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemusicoAPIRequest $request)
    {
        $input = $request->all();

        $musico = $this->musicoRepository->create($input);

        return $this->sendResponse($musico->toArray(), 'Musico saved successfully');
    }

    /**
     * Display the specified musico.
     * GET|HEAD /musicos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var musico $musico */
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            return $this->sendError('Musico not found');
        }

        return $this->sendResponse($musico->toArray(), 'Musico retrieved successfully');
    }

    /**
     * Update the specified musico in storage.
     * PUT/PATCH /musicos/{id}
     *
     * @param int $id
     * @param UpdatemusicoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemusicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var musico $musico */
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            return $this->sendError('Musico not found');
        }

        $musico = $this->musicoRepository->update($input, $id);

        return $this->sendResponse($musico->toArray(), 'musico updated successfully');
    }

    /**
     * Remove the specified musico from storage.
     * DELETE /musicos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var musico $musico */
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            return $this->sendError('Musico not found');
        }

        $musico->delete();

        return $this->sendSuccess('Musico deleted successfully');
    }
}
