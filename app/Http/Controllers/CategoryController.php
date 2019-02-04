<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Profile;
use App\Post;
use App\User;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $cat = Category::all();

        return view('category.cat', compact('cat'));
    }

    public function show(Category $cat)
    {
        $cat->load('posts');
        return view('category.display', compact('cat'));
    }

    public function store(Request $request)
    {
        $cat = new Category;
        $cat->category = $request->category;
        $cat->save();
        return redirect('categories')->with('response', 'Category added successfully');
    }

    public function returncat()
    {
        $cat = Category::all();
        return view('post.addpost', compact('cat'));
    }

    public function post(Category $cat)
    {
        $cat->load('posts');

        return view('category.show', compact('cat'));


    }
}
