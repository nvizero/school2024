<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $files = File::all();
        $files = DB::table("files")->get();

        return view('files.index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('imgs'), $fileName);

        File::create([
            'user_id' => auth()->id(),
            'name' => $fileName,
            'type' => $type,
            'size' => $size
        ]);

        return redirect()->route('files.index')->withSuccess(__('File added successfully.'));
    }

}
