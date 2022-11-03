<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        $post = Post::orderBy('created_at', 'DESC')->get();
        //API
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'photo' => $request->photo,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ];

        Post::create($data);

        $post = Post::orderBy('created_at', 'DESC')->get();

        return response()->json([
            'success' => true,
            'msg' => 'Data Berhasil Dibuat'
        ]);
    }

    public function show($id)
    {
        $data = Post::where('id', $id)->get();
        if ($data != null) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }else {
            return '404';
        }
    }

    public function update(Request $request, $id)
    {
        $data = Post::where('id', $id)->first();
        $data->update([
            'title' => $request->title,
            'photo' => $request->photo,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);

        return response()->json([
            'success' => true,
            'msg' => 'Data Berhasil Diupdate'
        ]);
    }

    public function destroy($id)
    {
        $data = Post::where('id', $id)->first()->delete();
        return response()->json([
            'success' => true,
            'msg' => 'Data Berhasil Dihapus'
        ]);
    }
}
