<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $data = Post::with('pengguna')->orderBy('updated_at', 'DESC')->get();
        $parsedData = [];
        foreach($data as $key => $value) {
            $parsedData[] = [
                'id' => $value->id,
                'username' => $value->pengguna->username,
                'post' => $value->post,
            ];
        }
        
        return response()->json(['success' => true, 'data' => $parsedData, 'message' => 'Berhasil Fetch Data'], 200);
    }

    public function store(Request $request)
    {
        $data = new Post();
        $data->pengguna_auth_id = $request->auth_id;
        $data->post = $request->post;

        if($data->save())
        return response()->json(['message' => 'Data Berhasil disimpan'], 200);
        else return response()->json(['message' => $data->getErrors()], 400);

    }

}
