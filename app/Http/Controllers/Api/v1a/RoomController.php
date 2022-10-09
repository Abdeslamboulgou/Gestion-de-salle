<?php

namespace App\Http\Controllers\Api\v1a;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Room;
use DateTime;

class RoomController extends Controller
{

  /**
   * suspended the specified resource in storage.
   * @param \Illuminate\Http\Request $request
   * @param string $uid
   * @return \Illuminate\Http\Response
   */

  public function suspended(Request $request, $uid)
  {
    try {
      $room = Room::where('uid', '=', $uid)->first();

      if (!($room)) {
        return response()->json(['error' => "Can't find room with uid " . $uid,], 404);
      }

      $room->update([
        $room->suspension = $request->input('suspension')

      ]);
      return response()->json(['msg' => "Update successful",], 204);
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't update room with uid " . $uid,], 500);
    }
  }

  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    try {
      $rooms = Room::all();
      if (empty($rooms)) {
        return response()->json([
          'error' => "Empty list rooms",
        ], 404);
      }
      return response()->json([
        'rooms' => $rooms,
      ], 200);
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't list all rooms",], 500);
    }
  }
  /**
   * Display the specified resource.
   * @param string $uid
   * @return \Illuminate\Http\Response
   */
  public function show($uid)
  {
    try {
      $room = Room::where('uid', '=', $uid)->first();

      if (!($room)) {

        return response()->json(['error' => "Rooms with uid " . $uid . " not found",], 404);
      }
      return response()->json(['room' => $room,], 200);
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't find room with uid " . $uid,], 500);
    }
  }
  /**
   * Store a newly created resource in storage.
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //$currentDateTime = Date('DD-MM-YYYY H:i:s');
    $currentDateTime =new DateTime();
    $currentDateTime=$currentDateTime->format('d-m-Y H:i:s');
    try {

      $room = new Room();
      $room->name = $request->input('name');
      $room->id_owner = $request->input('id_owner');
      $room->openingDate = $request->input('openingDate');
      $room->closingDate = $request->input('closingDate');
      $room->suspension = $request->input('suspension');
      $room->type = $request->input('type');
      $room->uid = str_replace('-', '', Str::uuid());
      if ($room->openingDate > $currentDateTime and $room->closingDate > $room->openingDate) {
        $room->save();
        return response()->json(['room' => $room,], 201);
      } else {
        return response()->json(['error' => "Date incorrect ",], 406);
      }
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't create this room",], 500);
    }
  }


  // edit room
  public function edit($uid)
  {
    $room = Room::find($uid);
    return response()->json($room);
  }

  /**
   * Update the specified resource in storage.
   * @param \Illuminate\Http\Request $request
   * @param string $uid
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $uid)
  {

    try {
      $room = Room::where('uid', '=', $uid)->first();

      if (!($room)) {
        return response()->json(['error' => "Can't find room with uid " . $uid,], 404);
      }

      $room->update([
        $room->name = $request->input('name'),
        $room->id_owner = $request->input('id_owner'),
        $room->openingDate = $request->input('openingDate'),
        $room->closingDate = $request->input('closingDate'),
        $room->suspension = $request->input('suspension'),
        $room->type = $request->input('type'),
      ]);
      return response()->json(['msg' => "Update successful",], 204);
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't update room with uid " . $uid,], 500);
    }
  }
  /**
   * Remove the specified resource from storage.
   * @param string $uid
   * @return \Illuminate\Http\Response
   */
  public function destroy($uid)
  {
    try {
      $room = Room::where('uid', '=', $uid)->first();
      if (!($room)) {
        return response()->json(['error' => "Can't find room with uid " . $uid,], 404);
      }
      if ($room->delete()) {

        return response()->json(['message' => "The room $room->uid has successfully been deleted.",], 200);
      } else {
        return response()->json(['error' => "Database error : can't delete room with uid " . $uid,], 500);
      }
    } catch (Exception $ex) {
      return response()->json(['error' => "Can't delete this room",], 500);
    }
  }
}
