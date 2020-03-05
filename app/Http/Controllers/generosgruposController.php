<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategenerosgruposRequest;
use App\Http\Requests\UpdategenerosgruposRequest;
use App\Repositories\generosgruposRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class generosgruposController extends AppBaseController
{
    /** @var  generosgruposRepository */
    private $generosgruposRepository;

    public function __construct(generosgruposRepository $generosgruposRepo)
    {
        $this->generosgruposRepository = $generosgruposRepo;
    }

    /**
     * Display a listing of the generosgrupos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generosgrupos = $this->generosgruposRepository->paginate(10);

        return view('generosgrupos.index')
            ->with('generosgrupos', $generosgrupos);
    }

    /**
     * Show the form for creating a new generosgrupos.
     *
     * @return Response
     */
    public function create()
    {
        return view('generosgrupos.create');
    }

    /**
     * Store a newly created generosgrupos in storage.
     *
     * @param CreategenerosgruposRequest $request
     *
     * @return Response
     */
    public function store(CreategenerosgruposRequest $request)
    {
        $input = $request->all();

        $generosgrupos = $this->generosgruposRepository->create($input);

        Flash::success('Generosgrupos saved successfully.');

        return redirect(route('generosgrupos.index'));
    }

    /**
     * Display the specified generosgrupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            Flash::error('Generosgrupos not found');

            return redirect(route('generosgrupos.index'));
        }

        return view('generosgrupos.show')->with('generosgrupos', $generosgrupos);
    }

    /**
     * Show the form for editing the specified generosgrupos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            Flash::error('Generosgrupos not found');

            return redirect(route('generosgrupos.index'));
        }

        return view('generosgrupos.edit')->with('generosgrupos', $generosgrupos);
    }

    /**
     * Update the specified generosgrupos in storage.
     *
     * @param int $id
     * @param UpdategenerosgruposRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategenerosgruposRequest $request)
    {
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            Flash::error('Generosgrupos not found');

            return redirect(route('generosgrupos.index'));
        }

        $generosgrupos = $this->generosgruposRepository->update($request->all(), $id);

        Flash::success('Generosgrupos updated successfully.');

        return redirect(route('generosgrupos.index'));
    }

    /**
     * Remove the specified generosgrupos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $generosgrupos = $this->generosgruposRepository->find($id);

        if (empty($generosgrupos)) {
            Flash::error('Generosgrupos not found');

            return redirect(route('generosgrupos.index'));
        }

        $this->generosgruposRepository->delete($id);

        Flash::success('Generosgrupos deleted successfully.');

        return redirect(route('generosgrupos.index'));
    }
}
