<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index() : View
    {
        $categories= Category::all();
        return view('basic.category.index',compact('categories'));
    }

    public function create(): View
    {
        return view('basic.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $category = new Category;
        $category->title = $request->title;
        $category->comment = $request->comment;
        $category->is_active = $request->is_active;
        $category->has_private = $request->has_private;

        $validated = $request->validate([
            'title' => 'bail|required',
            'comment' => 'required',
            'is_active'=>'boolean',
            'has_private'=>'boolean',
        ]);

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
        //return to_route('categories.show', ['post' => $post->id]);
    }

    public function show(int $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function edit(int $id): View
    {
        $category = $this->show($id);
       return view('basic.category.create', compact('category'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $category = $this->show($id);
        $category->title = $request->title;
        $category->comment = $request->comment;
        $category->is_active = $request->is_active;
        $category->has_private = $request->has_private;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $category = $this->show($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
