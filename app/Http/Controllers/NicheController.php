<?php

namespace App\Http\Controllers;

use App\Http\Requests\NicheRequest;
use App\Niche;
use App\Shelf;
use Illuminate\Http\Request;

class NicheController extends Controller
{
    public function index()
    {
        $niche = Niche::all();
        $shelf = Shelf::all();
        return view('niche.index', compact('niche', 'shelf'));
    }

    public function create()
    {
        $shelf = Shelf::all();

        return view('niche.create',compact('shelf'));
    }

    public function store(NicheRequest $request)
    {
        Niche::create([
            'name' => $request->name,
            'shelf_id' => $request->shelf_id
        ]);

        return redirect()->route('niche.index');
    }

    public function edit($id)
    {
        $niche = Niche::findOrfail($id);
        $shelves= Shelf::all();
        return view('niche.edit', compact('niche', 'shelves'));
    }

    public function update(NicheRequest $request, $id)
    {
        $niche = Niche::findOrfail($id);
        $niche->update([
            'name'=>$request->name,
            'shelf_id'=>$request->shelf_id
        ]);
        return redirect()->route('niche.index');
    }
    public function destroy($id)
    {
        $niche = Niche::findOrfail($id);
        $niche->delete();
        return redirect()->route('niche.index');
    }




}
