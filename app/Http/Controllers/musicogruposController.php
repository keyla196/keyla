<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemusicogruposRequest;
use App\Http\Requests\UpdatemusicogruposRequest;
use App\Repositories\musicogruposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class musicogruposController extends AppBaseController
{
    /** @var  musicogruposRepository */
    private $musicogruposRepository;

    public function __construct(musicogruposRepository $musicogruposRepo)
    {
        $this->musicogruposRepository = $musicogruposRepo;
    }

    /**
     * Display a listing of the musicogrupos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $musicogrupos = $this->musicogruposRepository->paginate(10);

        return view('musicogrupos.index')
            ->with('musicogrupos', $musicogrupos);
    }

    /**
     * Show the form for creating a new musicogrupos.
     *
     * @return Response
     */
    public function create()
    {
        return view('musicogrupos.create');
    }

    /**
     * Store a newly created musicogrupos in storage.
     *
     * @param CreatemusicogruposRequest $request
     *
     * @return Response
     */
    public function store(CreatemusicogruposRequest $request)
    {
        $input = $request->all();

        $musicogrupos = $this->musicogruposRepository->create($input);

        Flash::success('Musicogrupos saved successfully.');

        return redirect(route('musicogrupos.index'));
    }

    /**
     * Display the specified musicogrupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            Flash::error('Musicogrupos not found');

            return redirect(route('musicogrupos.index'));
        }

        return view('musicogrupos.show')->with('musicogrupos', $musicogrupos);
    }

    /**
     * Show the form for editing the specified musicogrupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            Flash::error('Musicogrupos not found');

            return redirect(route('musicogrupos.index'));
        }

        return view('musicogrupos.edit')->with('musicogrupos', $musicogrupos);
    }

    /**
     * Update the specified musicogrupos in storage.
     *
     * @param int $id
     * @param UpdatemusicogruposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemusicogruposRequest $request)
    {
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            Flash::error('Musicogrupos not found');

            return redirect(route('musicogrupos.index'));
        }

        $musicogrupos = $this->musicogruposRepository->update($request->all(), $id);

        Flash::success('Musicogrupos updated successfully.');

        return redirect(route('musicogrupos.index'));
    }

    /**
     * Remove the specified musicogrupos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $musicogrupos = $this->musicogruposRepository->find($id);

        if (empty($musicogrupos)) {
            Flash::error('Musicogrupos not found');

            return redirect(route('musicogrupos.index'));
        }

        $this->musicogruposRepository->delete($id);

        Flash::success('Musicogrupos deleted successfully.');

        return redirect(route('musicogrupos.index'));
    }
}
