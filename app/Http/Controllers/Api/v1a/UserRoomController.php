<?php

namespace App\Http\Controllers\Api\v1a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRoomController extends Controller
{

    /**
     * suspended the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param string $uid
     * @return \Illuminate\Http\Response
     */

    public function showUserRoom()
    {
        try {
            $user=User::where('is_user',1)->first();
            //$user = User::where('id', $user->id)->first();
            $room = Room::where('id_owner', $user->id)->get();
           // $room = Room::where('id_owner', '=',$id)->get();

            if (!($room)) {

                return response()->json(['error' => "Rooms with id " . $user->id . " not found",], 404);
            }
            return response()->json(['rooms' => $room,], 200);
            
        } catch (Exception $ex) {
            return response()->json(['error' => "Can't find room with id: " . $user->id,], 500);
        }
    }
}
