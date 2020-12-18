<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(10);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        if ($request->hasFile('image'))
        {
            $image = $request->image->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'image' => $image ?? null,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at ? now() : null
        ]);

        return redirect(route('posts.index'))->withSuccess('Post added.');

    }

//    /**
//     * Display the specified post.
//     *
//     * @param  \App\Models\Post  $post
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Post $post)
//    {
//
//    }

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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->only(['title', 'content', 'category_id']);
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
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->delete();
        return back()->withSuccess('Post deleted.');

    }

    /**
     * Publish or unpublish post.
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function publishOrUnpublish(Post $post)
    {
        if ($post->published_at == null) {
            $post->published_at = now();
            $post->save();

            return back()->withSuccess('Post published');
        }

        $post->published_at = null;
        $post->save();

        return back()->withSuccess('Post unpublished');
    }

}
