<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::paginate(5);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
    
            $post = new BlogPost();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();
    
            Alert::success('Success', 'Blog Post Created Successfully!');
    
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Blog Post Created Unsuccessfully!');
    
            return redirect()->route('posts.index');
        }
        
    }

    public function edit($id)
    {
        $post = BlogPost::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'title' => 'required|max:255',
                'content' => 'required',
            ]);
    
            $post = BlogPost::find($id);
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();
    
            Alert::success('Updated', 'Blog Post Update Successfully!');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Blog Post Update Unsuccessfully!');
    
            return redirect()->route('posts.index');
        }
    }

    public function destroy($id)
    {
        try {
            $post = BlogPost::findOrFail($id);
            $post->delete();

            Alert::success('Deleted', 'Blog Post Delete Successfully!');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            Alert::error('Error', 'Blog Post Delete Unsuccessfully!');
    
            return redirect()->route('posts.index');
        }
    }
}
