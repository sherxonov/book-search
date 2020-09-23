<?php

namespace App\Http\Controllers;

use App\Http\Requests\NicheRequest;
use App\Services\NicheService;
use Illuminate\Http\Request;

class NicheController extends Controller
{

    /**
     * Service attribute
     *
     * @var \App\Services\NicheService
     */
    protected $service;

    /**
     * Construct
     *
     * @param NicheService $documentService
     */
    public function __construct(NicheService $nicheService)
    {
        $this->service = $nicheService;
    }

    /**
     * List of all Niches
     *
     * @return void
     */
    public function index(Request $request)
    {
        $niche = $this->service->repo->getAll();
        $shelf = $this->service->shelves($request);

        return view('niche.index', compact('niche', 'shelf'));
    }

    /**
     * Created Niche
     *
     * @return void
     */
    public function create(Request $request)
    {
        $shelf = $this->service->shelves($request);

        return view('niche.create',compact('shelf'));
    }

    /**
     * Store newly created
     *
     * @param NicheRequest $request
     * @return void
     */
    public function store(NicheRequest $request)
    {
        $this->service->create([
            'name' => $request->name,
            'shelf_id' => $request->shelf_id
        ]);

        return redirect()->route('niche.index');
    }

    /**
     * Show Niche
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $niche = $this->service->read($id);

        return view('niche.show', compact('niche'));
    }

    /**
     *
     *
     * @param [type] $id
     * @return void
     */
    public function edit(Request $request, $id)
    {
        $niche = $this->service->read($id);
        $shelves= $this->service->shelves($request);

        return view('niche.edit', compact('niche', 'shelves'));
    }

    /**
     * Update Niche
     *
     * @param NicheRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(NicheRequest $request, $id)
    {
        $niche = $this->service->read($id);
        $this->service->update($id,[
            'name'=>$request->name,
            'shelf_id'=>$request->shelf_id
        ]);

        return redirect()->route('niche.index');
    }

    /**
     * Remove niche
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $niche = $this->service->delete($id);

        return redirect()->route('niche.index');
    }




}
