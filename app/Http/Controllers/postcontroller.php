<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;
use Auth;
class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if($categories->count() == 0 || $tags->count() == 0)
        {
            session()->flash('info','there is no category or tag yet');
            return redirect()->back();
        }
        return view('admin.post.create')->with('categories', $categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'feature'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required'
        ]);
       $feature=$request->feature;
       $name=time().$feature->getClientOriginalName();
       $feature->move('uploads/posts/',$name);

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'feature'=>'uploads/posts/'.$name,
            'slug'=>Str::slug($request->title),
            'user_id'=>Auth::id()
        ]);
        $post->tags()->attach($request->tags);
        session()->flash('success','post created successfully');
        return redirect()->back();


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
        $post=Post::find($id);
        return view('admin.post.update')
                ->with('post',$post)
                ->with('categories',Category::all())
                ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        $post=Post::find($id);
        if($request->hasFile('feature'))
        {
            $feature=$request->feature;
            $name=time().$feature->getClientOriginalName();
            $feature->move('uploads/posts/',$name);
            $post->feature='uploads/posts/'.$name;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);
        session()->flash('success','post Updated successfully');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trashed($id)
    {
        $post=Post::find($id);
        $post->delete();
        session()->flash('success','the post is Trashed successfuly');
        return redirect()->back();

    }

    public function alltrashed()
    {
       $trash = Post::onlyTrashed()->get();
       return view('admin.post.trashed')->with('trash', $trash);
    }

     public function destroy($id)
    {
         $post=Post::withTrashed()->where('id',$id)->first();
         if($post->trashed())
         {
             $post->forceDelete();
         }
         $post->delete();
         session()->flash('success','the post is deleted successfuly');
         return redirect()->back();
    }

    //

      public function restoree($id)
        {
         $post=Post::withTrashed()->where('id',$id)->first();
         $post->restore();
         session()->flash('success','the post is restored successfuly');
         return redirect()->back();
        }



}
