<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());

        return redirect(route('categories.show-categories'))->withSuccess('Category added.');
    }

    /**
     * Display the specified post.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $latestPosts = Post::orderByDesc('published_at')->take(3)->get();

        return view('categories.show', [
            'posts' => $category->posts()->paginate(7),
            'categoryName' => $category->name,
            'categories' => Category::all(),
            'latestPosts' => $latestPosts
        ]);
    }

    /**
     * Display the all posts from all categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $posts = Post::orderByDesc('published_at')->paginate(7);
        $latestPosts = Post::orderByDesc('published_at')->take(3)->get();

        return view('categories.show', [
            'posts' => $posts,
            'categories' => Category::all(),
            'latestPosts' => $latestPosts
        ]);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Post  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        abort_if(Gate::denies('admin-access'), Response::HTTP_FORBIDDEN);

        return view('admin.categories.create')->with('category', $category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return back()->withSuccess('Category updated.');
    }

}
