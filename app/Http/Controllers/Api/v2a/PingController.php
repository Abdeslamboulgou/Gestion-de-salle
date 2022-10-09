<?php

namespace App\Http\Controllers\Api\v2a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function ping()
    {
        return response()->json([
            'datas'  => "Pong 2.0",
        ], 200);
    }

}
