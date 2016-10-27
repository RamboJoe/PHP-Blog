<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    public function getIndex() {
    	//$posts = Post::paginate(5);
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        //$posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

    	return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
    	// fetch from the db based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}
