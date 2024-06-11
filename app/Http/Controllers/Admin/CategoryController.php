<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.categories.index', ['categories' => Category::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //dd($request->all());
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');

        //dd($val_data);
        Category::create($val_data);

        return to_route('admin.categories.index')->with('message', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $allCategoryFotos = $category->fotos()->paginate(6);

        return view('admin.categories.show', compact('allCategoryFotos', 'category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        //dd($request->all());
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');

        //dd($val_data);
        $category->update($val_data);

        return to_route('admin.categories.index')->with('message', 'Category with id ' . $category->id . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
