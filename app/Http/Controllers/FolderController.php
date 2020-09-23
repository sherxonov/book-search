<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Http\Requests\FolderRequest;
use App\Models\Shelf;
use App\Services\FolderService;
use Illuminate\Http\Request;

class FolderController extends Controller
{

    /**
     * Service attribute
     *
     * @var \App\Services\FolderService
     */
    protected $service;

    /**
     * Construct
     *
     * @param FodlerService $folderService
     */

    public function __construct(FolderService $folderService)
    {
        $this->service = $folderService;
    }
    /**
     * List off all folders
     *
     * @return void
     */
    public function index(Request $request)
    {
        $folders = $this->service->repo->getAll();

        return view('folder.index', compact('folders'));
    }

    /**
     * Created document
     *
     * @return void
     */
    public function create(Request $request)
    {
        $shelves = $this->service->shelves($request);

        return view('folder.create', compact('shelves'));
    }

    /**
     * Store newly created resource
     *
     * @param FolderRequest $request
     * @return void
     */
    public function store(FolderRequest $request)
    {
        $this->service->create([
            'name' => $request->name,
            'niche_id' => $request->niche_id
        ]);

        return redirect()->route('folder.index');
    }

    public function edit(Request $request, $id)
    {
        $folder = $this->service->read($id);

        $shelves = $this->service->shelves($request);

        return view('folder.edit', compact('folder', 'shelves'));
    }

    /**
     * Update folder
     *
     * @param FolderRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(FolderRequest $request,$id)
    {
        $folder = $this->service->read($id);

        $this->service->update($id, [
            'name'=>$request->name,
            'niche_id'=>$request->niche_id
        ]);

        return redirect()->route('folder.index');
    }


    /**
     * show folder
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $folder = $this->service->read($id);

        return view('folder.show', compact('folder'));

    }
    /**
     * Remove folder
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $folder = $this->service->read($id);

        $folder->delete();

        return redirect()->route('folder.index');
    }




}
