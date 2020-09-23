<?php

namespace App\Http\Controllers;

use App\Http\Requests\NicheRequest;
use App\Niche;
use App\Shelf;
use Illuminate\Http\Request;

class NicheController extends Controller
{
    /**
     * List of all Niches
     *
     * @return void
     */
    public function index()
    {
        $niche = Niche::all();
        $shelf = Shelf::all();
        return view('niche.index', compact('niche', 'shelf'));
    }

    /**
     * Created Niche
     *
     * @return void
     */
    public function create()
    {
        $shelf = Shelf::all();

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
        Niche::create([
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
        $niche = Niche::findOrfail($id);

        return view('niche.show', compact('niche'));
    }

    /**
     *
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $niche = Niche::findOrfail($id);
        $shelves= Shelf::all();
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
        $niche = Niche::findOrfail($id);
        $niche->update([
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
        $niche = Niche::findOrfail($id);
        $niche->delete();
        return redirect()->route('niche.index');
    }




}
