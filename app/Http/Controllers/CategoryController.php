<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('can:listar usuarios')->only('index');
        $this->middleware('can:crear usuario')->only('create');
        $this->middleware('can:editar usuario')->only('edit');
        $this->middleware('can:eliminar usuario')->only('destroy');
        $this->middleware('can:visualizar usuario')->only('show');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        $category->save();

        return redirect()->route('category.index')
            ->with('message', 'Registro exitoso!')
            ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:assets,name,' . $category->id,
        ]);

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        $category->update();

        return redirect()->route('category.index')
            ->with('message', 'Actualización correcta!')
            ->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('message', 'Eliminación correcta!')
            ->with('icon', 'success');
    }
}
