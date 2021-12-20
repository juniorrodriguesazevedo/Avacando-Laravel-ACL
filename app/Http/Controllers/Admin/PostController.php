<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post_view')->only('index', 'show');
        $this->middleware('permission:post_create')->only('create', 'store');
        $this->middleware('permission:post_edit')->only('edit', 'update');
        $this->middleware('permission:post_destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::when(Auth::user()->hasRole('Author'), function ($query) {
            $query->where('user_id', Auth::id());
        })->paginate(10);

        return view('posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $file_name = $data['title'] . '.' . $data['image']->extension();
        $data['image'] = $data['image']->storeAs('posts', $file_name, 'public');

        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($data['title'], '-');

        Post::create($data);

        return redirect()->route('posts.index')
            ->with(['status' => 'Post cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file_name = $data['title'] . '.' . $data['image']->extension();
            Storage::delete(storage_path("app/public/$post->image"));
            $data['image'] = $data['image']->storeAs('posts', $file_name, 'public');
        }

        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data);

        return redirect()->route('posts.index')
            ->with(['status' => 'Post editado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index')
            ->with(['status' => 'Post deletado com sucesso!']);
    }
}
