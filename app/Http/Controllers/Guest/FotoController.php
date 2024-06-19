<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('guest.fotos.index', ['fotos' => Foto::where('published', 1)->orderByDesc('in_evidenza')->orderByDesc('id')->paginate(8)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
        return view('guest.fotos.show', compact('foto'));
    }
}
