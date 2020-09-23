<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelvesRequest;
use App\Niche;
use App\Shelf;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{

    /**
     * List of all shelves
     *
     * @return void
     */
    public function index()
    {
        $shelves = Shelf::all();
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
        Shelf::create([
            'name' => $request->name
        ]);
        return redirect()->route('shelves.index');
    }

    public function edit($id)
    {
        $shelf = Shelf::findOrfail($id);

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
        $shelf = Shelf::findOrfail($id);
        $shelf->update([
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
        $shelf = Shelf::findOrfail($id);
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
        $shelf = Shelf::findOrfail($id);

        return view('shelves.show', compact('shelf'));
    }





}
