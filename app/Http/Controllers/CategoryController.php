<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();

        return view('dashboard.category.index', ['data' => $category]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $filename = "";

        if ($request->file('icon')) {
            $file = $request->file('icon');

            $filename= "image/" . date('YmdHi.') . $file->getClientOriginalExtension();
            $file->move(public_path('image/'), $filename);
        }

        $create = Category::create([
            'name' => $request->name,
            'icon' => $filename
        ]);

        if ($create) {
            return redirect()->back()->with('success', 'data berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'data gagal ditambahkan');
        }
    }
}
