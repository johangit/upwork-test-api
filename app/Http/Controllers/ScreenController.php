<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreenController extends Controller
{
    public function show(int $id, Request $request)
    {
        if (!in_array($id, [1, 2, 3])) {
            abort(404);
        }

        return response()->json([
            'id' => $id,
            'content' => 'This is screen ' . $id,
        ]);
    }
}
