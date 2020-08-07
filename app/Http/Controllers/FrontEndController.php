<?php

namespace App\Http\Controllers;
use App\Category;
use App\Settings;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->with('title',Settings::first()->site_name)
                            ->with('categories',Category::take(5)->get())
                            ->with('post1',Post::orderBy('created_at','desc')->first())
                            ->with('post2',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('post3',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('category2',Category::find(2))
                            ->with('category6',Category::find(6))
                            ->with('setting',Settings::first());
    }

    public function singlepost($slug)
    {
        $post=Post::where('slug',$slug)->first();

        $next_id=Post::where('id','>',$post->id)->min('id');
        $prev_id=Post::where('id','<',$post->id)->max('id');

        return view('singlepage')->with('post',$post)
                                 ->with('tags',Tag::all())
                                 ->with('title',$post->title)
                                 ->with('categories',Category::take(5)->get())
                                 ->with('setting',Settings::first())
                                 ->with('next',Post::find($next_id))
                                 ->with('prev',Post::find($prev_id));

    }

    public function category($id)
    {
        $category=Category::find($id);
        return view('category')->with('category',$category)
                               ->with('categories',Category::take(5)->get())
                               ->with('setting',Settings::first())
                               ->with('title',$category->name);

    }

    public function tag($id)
    {
        $tag=Tag::find($id);
        return view('tag')->with('tag',$tag)
                               ->with('categories',Category::take(5)->get())
                               ->with('setting',Settings::first())
                               ->with('title',$tag->tag);

    }


    public function search()
    {
        $posts=Post::where('title','like','%'.request('query').'%')->get();
        return view('result')->with('posts',$posts)
                               ->with('categories',Category::take(5)->get())
                               ->with('setting',Settings::first())
                               ->with('query',request('query'))
                               ->with('title',request('query'));

    }


}
