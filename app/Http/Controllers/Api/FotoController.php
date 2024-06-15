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

        $queryBuilder = Foto::with('category')->orderByDesc('in_evidenza')->orderByDesc('id');

        if ($request->has('in_evidenza')) {
            $queryBuilder = $queryBuilder->where('in_evidenza', 1);
        }

        if ($request->has('category')) {
            $queryBuilder = $queryBuilder->where('category_id', $request->category);
        }

        if ($request->has('title')) {
            $queryBuilder = $queryBuilder->where('title', 'LIKE', '%' . $request->title . '%');
        }

        return response()->json([
            'success' => true,
            'results' => $queryBuilder->get()
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
