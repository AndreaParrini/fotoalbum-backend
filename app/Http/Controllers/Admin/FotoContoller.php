<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Foto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class FotoContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Foto::all());
        return view('admin.fotos.index', ['fotos' => Foto::orderByDesc('in_evidenza')->orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.fotos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request)
    {
        //dd($request->all());

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('in_evidenza')) {
            $val_data['in_evidenza'] = 1;
        }

        if ($request->has('image_path')) {
            $image_path = Storage::put('uploads', $request->image_path);
            //dd($image_path);
            $val_data['image_path'] = $image_path;
        }

        //dd($val_data);
        Foto::create($val_data);

        return to_route('admin.fotos.index')->with('message', 'Foto uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
        return view('admin.fotos.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
        return view('admin.fotos.edit', compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoRequest $request, Foto $foto)
    {
        //dd($request->all(), $foto);

        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->title, '-');

        if ($request->has('in_evidenza')) {
            $val_data['in_evidenza'] = 1;
        } else {
            $val_data['in_evidenza'] = 0;
        }

        if ($request->has('image_path')) {
            if ($foto->image_path) {
                Storage::delete($foto->image_path);
            }
            $image_path = Storage::put('uploads', $request->image_path);
            //dd($image_path);
            $val_data['image_path'] = $image_path;
        }

        //dd($val_data);
        $foto->update($val_data);
        return to_route('admin.fotos.index')->with('message', 'Foto ' . $foto->id . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
    {
        //
        if ($foto->image_path) {
            Storage::delete($foto->image_path);
        }
        $foto->delete();

        return to_route('admin.fotos.index')->with('message', 'Foto  ' . $foto->id . '  cancelled successfully');
    }
}
