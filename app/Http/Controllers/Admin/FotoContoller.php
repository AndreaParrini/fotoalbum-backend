<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Foto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FotoContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Foto::all());
        return view('admin.fotos.index', ['fotos' => Foto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fotos = Foto::all();
        return view('admin.fotos.create', compact('fotos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request)
    {
        //dd($request->all());

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('image_path')) {
            $image_path = Storage::put('uploads', $request->image_path);
            //dd($image_path);
            $val_data['image_path'] = $image_path;
        }

        Foto::create($val_data);

        return to_route('admin.fotos.index')->with('message', 'Foto uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoRequest $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
