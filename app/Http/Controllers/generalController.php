<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreategeneralRequest;
use App\Http\Requests\UpdategeneralRequest;
use App\Repositories\generalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class generalController extends AppBaseController
{
    /** @var  generalRepository */
    private $generalRepository;

    public function __construct(generalRepository $generalRepo)
    {
        $this->generalRepository = $generalRepo;
    }

    /**
     * Display a listing of the general.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $generals = $this->generalRepository->paginate(10);

        return view('generals.index')
            ->with('generals', $generals);
    }

    /**
     * Show the form for creating a new general.
     *
     * @return Response
     */
    public function create()
    {
        return view('generals.create');
    }

    /**
     * Store a newly created general in storage.
     *
     * @param CreategeneralRequest $request
     *
     * @return Response
     */
    public function store(CreategeneralRequest $request)
    {
        $input = $request->all();

        $general = $this->generalRepository->create($input);

        Flash::success('General saved successfully.');

        return redirect(route('generals.index'));
    }

    /**
     * Display the specified general.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            Flash::error('General not found');

            return redirect(route('generals.index'));
        }

        return view('generals.show')->with('general', $general);
    }

    /**
     * Show the form for editing the specified general.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            Flash::error('General not found');

            return redirect(route('generals.index'));
        }

        return view('generals.edit')->with('general', $general);
    }

    /**
     * Update the specified general in storage.
     *
     * @param int $id
     * @param UpdategeneralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdategeneralRequest $request)
    {
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            Flash::error('General not found');

            return redirect(route('generals.index'));
        }

        $general = $this->generalRepository->update($request->all(), $id);

        Flash::success('General updated successfully.');

        return redirect(route('generals.index'));
    }

    /**
     * Remove the specified general from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $general = $this->generalRepository->find($id);

        if (empty($general)) {
            Flash::error('General not found');

            return redirect(route('generals.index'));
        }

        $this->generalRepository->delete($id);

        Flash::success('General deleted successfully.');

        return redirect(route('generals.index'));
    }
}
