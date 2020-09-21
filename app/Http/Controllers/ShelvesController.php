<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShelvesRequest;
use App\Shelf;
use Illuminate\Http\Request;

class ShelvesController extends Controller
{

    public function index()
    {
        $shelves = Shelf::all();
        return view('shelves.index', compact('shelves'));
    }

    public function create()
    {
        return view('shelves.create');
    }

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
    public function update(ShelvesRequest $request,$id)
    {
        $shelf = Shelf::findOrfail($id);
        $shelf->update([
            'name'=>$request->name

        ]);
        return redirect()->route('shelves.index');
    }

    public function destroy($id)
    {
        $shelf = Shelf::findOrfail($id);
        $shelf->delete();
        return redirect()->route('shelves.index');
    }






}
