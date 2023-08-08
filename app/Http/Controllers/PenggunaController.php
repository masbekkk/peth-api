<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function store(Request $request)
    {
        $data = Pengguna::where('auth_id', $request->auth_id)->first();
        if (!empty($data))
            $data->username = $request->username;
        else {
            $data = new Pengguna();
            $data->auth_id = $request->auth_id;
            $data->username = $request->username;
        }
        // ['username' => $request->username]);
        // $data->auth_id = ;

        if ($data->save())
            return response()->json(['message' => 'Data Berhasil disimpan'], 200);
        else return response()->json(['message' => $data->getErrors()], 400);
    }
}
