<?php

namespace App\Http\Controllers;

use App\Document;
use App\Http\Requests\DocumentRequest;
use App\Shelf;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    /**
     * List of all files
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $document = Document::where('name', 'like', '%'.$request->get('q').'%')->get();
        $shelf = Shelf::all();

        return view('document.index', compact('document', 'shelf'));
    }

    /**
     * Created of document
     *
     * @return void
     */
    public function create()
    {
        $shelves = Shelf::all();
        return view('document.create', compact('shelves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocumentRequest $request
     * @return void
     */
    public function store(DocumentRequest $request)
    {
        $file = $request->file('file');
        $originalname = $file->getClientOriginalName();
        $uploaded = $file->store('public');


        Document::create([
            'file' => $uploaded,
            'name'=>$originalname,
            'folder_id' => $request->folder_id
        ]);

        return redirect()->route('document.index');
    }


    public function edit($id)
    {
        $document = Document::findOrfail($id);
        $shelves = Shelf::all();
        return view('document.edit', compact('document', 'shelves'));
    }
    /**
     * Update document in storage
     *
     * @param DocumentRequest $request
     * @param [type] $id
     * @return void
     */
    public function update(DocumentRequest $request,$id)
    {
        $document = Document::findOrfail($id);

        $name = $document->name;
        $file_name = $document->file;

        if ($request->file) {
            Storage::delete($file_name);
            $name = $request->file->getClientOriginalName();
            $file_name = $request->file->store('public');
        }

        $document->update([
            'name'=> $name,
            'file' => $file_name,
            'folder_id'=>$request->folder_id
        ]);

        return redirect()->route('document.index');
    }

    /**
     * Remove document in sotage
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $document = Document::findOrfail($id);
        Storage::delete($document->file);
        $document->delete();

        return redirect()->route('document.index');
    }

    public function download($id)
    {
        $document = Document::findOrfail($id);

        return Storage::download($document->file, $document->name);
    }


}
