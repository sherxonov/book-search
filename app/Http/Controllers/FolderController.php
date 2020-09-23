<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests\FolderRequest;
use App\Shelf;
use Illuminate\Http\Request;

class FolderController extends Controller
{

    /**
     * List off all folders
     *
     * @return void
     */
    public function index()
    {
        $shelves = Shelf::all();
        $folders = Folder::all();
        return view('folder.index', compact('folders', 'shelves'));
    }

    /**
     * Created document
     *
     * @return void
     */
    public function create()
    {
        $shelves = Shelf::all();

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
        Folder::create([
            'name' => $request->name,
            'niche_id' => $request->niche_id
        ]);


        return redirect()->route('folder.index');
    }

    public function edit($id)
    {
        $folder = Folder::findOrfail($id);
        $shelves = Shelf::all();
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
        $folder = Folder::findOrfail($id);
        $folder->update([
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
        $folder = Folder::findOrfail($id);

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
        $folder = Folder::findOrfail($id);
        $folder->delete();
        return redirect()->route('folder.index');
    }




}
