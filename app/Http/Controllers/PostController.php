<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.posts.create')
            ->with('categories', Category::all())
            ->with('post', null);
    }

    /**
     * Store a newly created post in storage.
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->image->store('posts', 'public');
        }
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $image ?? null,
            'galery' => $request->galery ? json_encode($request->galery) : null,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at ? now() : null
        ]);

        return redirect(route('posts.show-posts'))->withSuccess('Post added.');

    }

    /**
     * Display the specified post.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $latestPosts = Post::orderByDesc('published_at')->take(3)->get();

        return view('posts.show', [
            'post' => $post,
            'categories' => Category::all(),
            'latestPosts' => $latestPosts
        ]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.create')
            ->with('post', $post)
            ->with('categories', Category::all());
    }

    /**
     * Update the specified post in storage.
     *
     * @param UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->title);
        $data['published_at'] = $request->published_at ?: null;

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('posts', 'public');
            $post->deleteImage();
        }

        $post->update($data);
        return back()->withSuccess('Post updated.');
    }

    /**
     * Remove the specified image in storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Post $post)
    {
        $post->deleteImage();
        $post->image = null;
        $post->save();
        return back();
    }




}
