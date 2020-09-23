<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelvesRequest;
use App\Services\ShelfService;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{


    /**
     * Service attribute
     *
     * @var \App\Services\ShelfService
     */
    protected $service;

    /**
     * Construct
     *
     * @param ShelfService $shelfService
     */

    public function __construct(ShelfService $shelfService)
    {
        $this->service = $shelfService;
    }


    /**
     * List of all shelves
     *
     * @return void
     */
    public function index()
    {
        $shelves = $this->service->repo->getAll();
        return view('shelves.index', compact('shelves'));
    }

    /**
     * Created shelf
     *
     * @return void
     */
    public function create()
    {
        return view('shelves.create');
    }

    /**
     * storage newly created
     *
     * @param ShelvesRequest $request
     * @return void
     */
    public function store(ShelvesRequest $request)
    {
        $this->service->create([
            'name' => $request->name
        ]);
        return redirect()->route('shelves.index');
    }

    public function edit($id)
    {
        $shelf = $this->service->read($id);

        return view('shelves.edit', compact('shelf'));
    }

    /**
     * Update shelf
     *
     * @param ShelvesRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(ShelvesRequest $request,$id)
    {
        $shelf = $this->service->read($id);
        $this->service->update($id,[
            'name'=>$request->name

        ]);
        return redirect()->route('shelves.index');
    }

    /**
     * Remove shelf
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $shelf = $this->service->read($id);
        $shelf->delete();
        return redirect()->route('shelves.index');
    }

    /**
     * Show shelf
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $shelf = $this->service->read($id);

        return view('shelves.show', compact('shelf'));
    }





}
