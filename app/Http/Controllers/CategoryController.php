<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    const PATH_VIEW = 'categories.';

    public function index()
    {
        $categories = DB::table('categories')->orderByDesc('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request['name'],
        ];

        DB::table('categories')->insert($data);

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view(self::PATH_VIEW . 'edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request['name'],
        ];

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }
}
