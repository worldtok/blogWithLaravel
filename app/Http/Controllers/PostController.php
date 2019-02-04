<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Profile;
use App\Post;
use App\User;
use App\Comment;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
       // return $post->links();
        //return $post;
        return view('post.post', compact('posts'));// ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $cat = Category::all();
        return view('post.show', ['post' => $post, 'cat' => $cat]);
    }

    public function store(Request $request, Category $cat)
    {
        $this->validate(
            $request,
            [
                'body' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'required',
                'author' => 'required'

            ]
        );
        $post = new Post;
        $post->body = $request->body;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->summary = $request->summary;
        $post->tags = $request->tags;
        $post->user_id = Auth::id();
        /**
         * arrangingg for the acceptance of the image file
         */

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path() . '/uploads/', date('d-m-y') . $file->getClientOriginalName());
            $url = URL('/uploads/' . date('d-m-y') . $file->getClientOriginalName());
            //return $url;
        }
       // return (redirect('/home')->with('response', 'profile saved successfully'))

        $post->image = $url;
       // return $url;
        $cat->posts()->save($post);
        return redirect('categories')->with('response', 'post added successfully');

    }
    public function add(Request $request)
    {

        $this->validate(
            $request,
            [
                'body' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'required',
                'author' => 'required',
                'category_id' => 'required'

            ]
        );
        $post = new Post;
        $post->body = $request->body;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->summary = $request->summary;
        $post->category_id = $request->category_id;
        $post->tags = $request->tags;
        $post->user_id = Auth::id();
        /**
         * arrangingg for the acceptance of the image file
         */

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path() . '/uploads/', date('d-m-y') . $file->getClientOriginalName());
            $url = URL('/uploads/' . date('d-m-y') . $file->getClientOriginalName());
            //return $url;
        }
       // return (redirect('/home')->with('response', 'profile saved successfully'))

        $post->image = $url;
       // return $url;
        $post->save();
        return redirect('post')->with('response', 'Post Added sucessfully');

    }


    public function edit($post)
    {
        $cat = Category::all();
        $post = Post::find($post);
        $category = Category::find($post->category_id);
        //return $category;

        return view('post.edit', ['cat' => $cat, 'post' => $post, 'category' => $category]);

    }

    public function delete($post)
    {
        Post::where('id', $post)->delete();

       // return $post;
        return redirect('post')->with('response', 'post deleted successfully');

    }

    public function edited(Request $request, Post $post)
    {


        $this->validate(
            $request,
            [
                'body' => 'required',
                'title' => 'required',
                'summary' => 'required',
                'image' => 'required',
                'author' => 'required',
                'tags' => 'required',
                'category_id' => 'required'

            ]
        );
        $post = new Post;
        $post->body = $request->body;
        $post->Title = $request->title;
        $post->author = $request->author;
        $post->summary = $request->summary;
        $post->category_id = $request->category_id;
        $post->tags = $request->tags;
        $post->user_id = Auth::id();
        /**
         * arrangingg for the acceptance of the image file
         */

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path() . '/uploads/', date('d-m-y') . $file->getClientOriginalName());
            $url = URL('/uploads/' . date('d-m-y') . $file->getClientOriginalName());
            //return $url;
        }
       // return (redirect('/home')->with('response', 'profile saved successfully'))

        $post->image = $url;
       // return $url;

        $data = array([
            'title' => $post->Title,
            'body' => $post[' body '],
            'user_id' => $post->user_id,
            'caregory_id' => $post->cetegory_id,
            'author' => $post->author,
            'tags' => $post->tags,
            'image' => $post->image
        ]);
        Post::where(' id ', $post)->update($data);

        return redirect(' post ')->with(' response ', ' Post updated sucessfully');

    }
    public function update(Request $request, $post)
    {
        $post = Post::find($post);
        $post->body = $request->body;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->summary = $request->summary;
        $post->category_id = $request->category_id;
        $post->tags = $request->tags;
       // $post->user_id = Auth::id();
        /**
         * arrangingg for the acceptance of the image file
         */

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $file->move(public_path() . '/uploads/', date('d-m-y') . $file->getClientOriginalName());
            $url = URL('/uploads/' . date('d-m-y') . $file->getClientOriginalName());
            //return $url;
        }
       // return (redirect('/home')->with('response', 'profile saved successfully'))

        $post->image = $url;
       // return $url;
        $post->save();
        return redirect('post')->with('response', 'Post Added sucessfully');



       // $post->update($request->except('_token', '_method'));

    }
}

