<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemusicogruposAPIRequest;
use App\Http\Requests\API\UpdatemusicogruposAPIRequest;
use App\Models\musicogrupos;
use App\Repositories\musicogruposRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class musicogruposController
 * @package App\Http\Controllers\API
 */

class musicogruposAPIController extends AppBaseController
{
    /** @var  musicogruposRepository */
    private $musicogruposRepository;

    public function __construct(musicogruposRepository $musicogruposRepo)
    {
        $this->musicogruposRepository = $musicogruposRepo;
    }

    /**
     * Display a listing of the musicogrupos.
     * GET|HEAD /musicogrupos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $musicogrupos = $this->musicogruposRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($musicogrupos->toArray(), 'Musicogrupos retrieved successfully');
    }

    /**
     * Store a newly created musicogrupos in storage.
     * POST /musicogrupos
     *
     * @param CreatemusicogruposAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemusicogruposAPIRequest $request)
    {
        $input = $request->all();

        $musicogrupos = $this->musicogruposRepository->create($input);

        return $this->sendResponse($musicogrupos->toArray(), 'Musicogrupos saved successfully');
    }

    /**
     * Display the specified musicogrupos.
     * GET|HEAD /musicogrupos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var musicogrupos $musicogrupos */
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            return $this->sendError('Musicogrupos not found');
        }

        return $this->sendResponse($musicogrupos->toArray(), 'Musicogrupos retrieved successfully');
    }

    /**
     * Update the specified musicogrupos in storage.
     * PUT/PATCH /musicogrupos/{id}
     *
     * @param int $id
     * @param UpdatemusicogruposAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemusicogruposAPIRequest $request)
    {
        $input = $request->all();

        /** @var musicogrupos $musicogrupos */
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            return $this->sendError('Musicogrupos not found');
        }

        $musicogrupos = $this->musicogruposRepository->update($input, $id);

        return $this->sendResponse($musicogrupos->toArray(), 'musicogrupos updated successfully');
    }

    /**
     * Remove the specified musicogrupos from storage.
     * DELETE /musicogrupos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var musicogrupos $musicogrupos */
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            return $this->sendError('Musicogrupos not found');
        }

        $musicogrupos->delete();

        return $this->sendSuccess('Musicogrupos deleted successfully');
    }
}
