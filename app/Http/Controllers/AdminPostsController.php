<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsEditRequest;
use App\Http\Requests\PostsRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories', 'users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();
        $user->posts;
        //return redirect('/admin/users');
        //return view('admin.users.store');
        //return $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        $user->posts()->create($input);
        Session::flash('added_post', 'The post has been successfully created');
        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $post->update($input);
        Session::flash('updated_post', 'The post has been successfully updated');
        return redirect('admin.posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        if ($post->photo_id == 0) {
            $post->delete();
        } else {
            unlink(public_path() . $post->photo->file);
            $post->delete();
        }
        Session::flash('deleted_post', 'The post has been successfully deleted');
        return redirect('/admin/posts');
    }

    public function post($slug){
        $post = Post::findBySlug($slug);
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post', compact('post', 'comments'));
    }
}
