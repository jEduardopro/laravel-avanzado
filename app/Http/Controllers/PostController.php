<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    protected $repository, $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth')->except(['index','show']);
        $this->repository = new Repository(new Post());
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',[
            'posts' => $this->repository->all(true),
            'paginate' => true
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $this->repository->save($request->all(),true);
        return redirect()->route('posts.my');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $counter = 0;
        // if (Redis::exists('post:views:'.$post->id)) {
        //     Redis::incr('post:views:'.$post->id);
        //     $counter = Redis::get('post:views:'.$post->id);
        // } else {
        //     Redis::set('post.views:'.$post->id, 0);
        // }
        return view('posts.show', ['post'=>$this->repository->find($post->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$this->repository->find($post->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $this->repository->update($request->all(), $post->id);
        return redirect()->route('posts.edit', ['post'=> $post])->with('message', 'Post Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // $this->authorize('delete', $post);
        // para Gate forUser, allows, denies, authorize
        if(!Gate::allows('delete-post',$post)) return redirect()->back();
        $post->delete();
        return redirect()->route('posts');
    }

    public function myPosts()
    {
        return view('posts.my', [
            'posts' => $this->postRepository->myPosts()
        ]);
    }
}
