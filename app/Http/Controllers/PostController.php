<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    const PATH_VIEW = 'posts.';
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'name')
            ->orderByDesc('id')
            ->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('posts'));
    }
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }
    public function store(Request $request)
    {
        $data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'img' => $request['img'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
        ];

        DB::table('posts')->insert($data);

        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        $post = Post::with('comments')->find($id);


        return view(self::PATH_VIEW . 'show', compact('post'));
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('categories')->get();

        return view(self::PATH_VIEW . 'edit', compact('post', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request['title'],
            'description' => $request['description'],
            'img' => $request['img'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
        ];

        DB::table('posts')->where('id', $id)->update($data);

        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();
        return redirect()->route('posts.index');
    }

    // tim kiem
    public function search(Request $request)
    {
        $categoryId = $request->input('category_id');
        $categories = Category::all();

        if ($categoryId) {
            $posts = Post::where('category_id', $categoryId)->paginate(10);
        } else {
            $posts = Post::paginate(10);
        }

        return view('posts.search', compact('posts', 'categories'));
    }
}