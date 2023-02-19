<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $categories= Category::all();
        return view('basic.category.index',compact('categories'));
    }

    public function create()
    {
        return view('basic.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $category = new Category;
        $category->name = $request->title;
        $category->description = $request->comment;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(string $id): Response
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function edit(string $id)
    {
        $category = $this->show($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $category = $this->show($id);
        $category->title = $request->title;
        $category->comment = $request->comment;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $category = $this->show($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
