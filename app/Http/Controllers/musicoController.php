<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemusicoRequest;
use App\Http\Requests\UpdatemusicoRequest;
use App\Repositories\musicoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class musicoController extends AppBaseController
{
    /** @var  musicoRepository */
    private $musicoRepository;

    public function __construct(musicoRepository $musicoRepo)
    {
        $this->musicoRepository = $musicoRepo;
    }

    /**
     * Display a listing of the musico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $musicos = $this->musicoRepository->paginate(10);

        return view('musicos.index')
            ->with('musicos', $musicos);
    }

    /**
     * Show the form for creating a new musico.
     *
     * @return Response
     */
    public function create()
    {
        return view('musicos.create');
    }

    /**
     * Store a newly created musico in storage.
     *
     * @param CreatemusicoRequest $request
     *
     * @return Response
     */
    public function store(CreatemusicoRequest $request)
    {
        $input = $request->all();

        $musico = $this->musicoRepository->create($input);

        Flash::success('Musico saved successfully.');

        return redirect(route('musicos.index'));
    }

    /**
     * Display the specified musico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            Flash::error('Musico not found');

            return redirect(route('musicos.index'));
        }

        return view('musicos.show')->with('musico', $musico);
    }

    /**
     * Show the form for editing the specified musico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            Flash::error('Musico not found');

            return redirect(route('musicos.index'));
        }

        return view('musicos.edit')->with('musico', $musico);
    }

    /**
     * Update the specified musico in storage.
     *
     * @param int $id
     * @param UpdatemusicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemusicoRequest $request)
    {
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            Flash::error('Musico not found');

            return redirect(route('musicos.index'));
        }

        $musico = $this->musicoRepository->update($request->all(), $id);

        Flash::success('Musico updated successfully.');

        return redirect(route('musicos.index'));
    }

    /**
     * Remove the specified musico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $musico = $this->musicoRepository->find($id);

        if (empty($musico)) {
            Flash::error('Musico not found');

            return redirect(route('musicos.index'));
        }

        $this->musicoRepository->delete($id);

        Flash::success('Musico deleted successfully.');

        return redirect(route('musicos.index'));
    }
}
