<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PlayerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->firstName = $request->fistName;
        $player->lastNames = $request->lastName;
        $player->save();
    
        return response(null, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $player = new Player();
        $player->firstName = $request->firstName;
        $player->lastName = $request->lastName;
        $player->save();

        return response($team->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index(Request $request, $id)
    {
        // return one or all
        return response(Team::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
