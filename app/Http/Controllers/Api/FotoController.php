<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->has('evidenza')) {
            return response()->json([
                'success' => true,
                'results' => Foto::with('category')->orderByDesc('in_evidenza')->orderByDesc('id')->where('in_evidenza', 1)->limit(4)->get()
            ]);
        }
        return response()->json([
            'success' => true,
            'results' => Foto::with('category')->orderByDesc('in_evidenza')->orderByDesc('id')->get()
        ]);
    }

    public function show($id)
    {
        $foto = Foto::with('category')->where('id', $id)->first();

        if ($foto) {
            return response()->json([
                'success' => true,
                'results' => $foto
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404! Foto NOT Found'
            ]);
        }
    }
}
