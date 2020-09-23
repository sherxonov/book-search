<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\DocumentService;

class DocumentController extends Controller
{

    /**
     * Service attribute
     *
     * @var \App\Services\DocumentService
     */
    protected $service;

    /**
     * Construct
     *
     * @param DocumentService $documentService
     */
    public function __construct(DocumentService $documentService)
    {
        $this->service = $documentService;
    }

    /**
     * List of all files
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $document = $this->service->filter($request->q);

        return view('document.index', compact('document'));
    }

    /**
     * Created of document
     *
     * @return void
     */
    public function create(Request $request)
    {
        $shelves = $this->service->shelf($request);

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


        $this->service->create([
            'file' => $uploaded,
            'name'=>$originalname,
            'folder_id' => $request->folder_id
        ]);

        return redirect()->route('document.index');
    }


    public function edit(Request $request, $id)
    {
        $document = $this->service->read($id);
        $shelves = $this->service->shelf($request);
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
        $document = $this->service->read($id);


        $name = $document->name;
        $file_name = $document->file;

        if ($request->file) {
            Storage::delete($file_name);
            $name = $request->file->getClientOriginalName();
            $file_name = $request->file->store('public');
        }

        $this->service->update($id, [
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
        $document = $this->service->read($id);
        Storage::delete($document->file);
        $document->delete();

        return redirect()->route('document.index');
    }

    public function download($id)
    {
        $document = $this->service->read($id);

        return Storage::download($document->file, $document->name);
    }


}
