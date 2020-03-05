<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreategeneralAPIRequest;
use App\Http\Requests\API\UpdategeneralAPIRequest;
use App\Models\general;
use App\Repositories\generalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class generalController
 * @package App\Http\Controllers\API
 */

class generalAPIController extends AppBaseController
{
    /** @var  generalRepository */
    private $generalRepository;

    public function __construct(generalRepository $generalRepo)
    {
        $this->generalRepository = $generalRepo;
    }

    /**
     * Display a listing of the general.
     * GET|HEAD /generals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $generals = $this->generalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($generals->toArray(), 'Generals retrieved successfully');
    }

    /**
     * Store a newly created general in storage.
     * POST /generals
     *
     * @param CreategeneralAPIRequest $request
     *
     * @return Response
     */
    public function store(CreategeneralAPIRequest $request)
    {
        $input = $request->all();

        $general = $this->generalRepository->create($input);

        return $this->sendResponse($general->toArray(), 'General saved successfully');
    }

    /**
     * Display the specified general.
     * GET|HEAD /generals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var general $general */
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            return $this->sendError('General not found');
        }

        return $this->sendResponse($general->toArray(), 'General retrieved successfully');
    }

    /**
     * Update the specified general in storage.
     * PUT/PATCH /generals/{id}
     *
     * @param int $id
     * @param UpdategeneralAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategeneralAPIRequest $request)
    {
        $input = $request->all();

        /** @var general $general */
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            return $this->sendError('General not found');
        }

        $general = $this->generalRepository->update($input, $id);

        return $this->sendResponse($general->toArray(), 'general updated successfully');
    }

    /**
     * Remove the specified general from storage.
     * DELETE /generals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var general $general */
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            return $this->sendError('General not found');
        }

        $general->delete();

        return $this->sendSuccess('General deleted successfully');
    }
}
