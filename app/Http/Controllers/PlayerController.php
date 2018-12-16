<?php

// TODO: error handling / validation

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class PlayerController extends BaseController
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function update(Request $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->firstName = $request->firstName;
        $player->lastName = $request->lastName;
        $player->{'team_id'} = $request->{'team_id'};
        $player->save();
    
        return response(null, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $player = new Player();
        $player->firstName = $request->firstName;
        $player->lastName = $request->lastName;
        $player->{'team_id'} = $request->{'team_id'};
        $player->save();

        return response($player->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index(Request $request, $id)
    {
        // TODO: return one or all
        return response(Team::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function delete(Request $request, $id) {
        try {
            Player::findOrFail($id)->delete();
        } 
        catch (Exception $e) {
            // TODO return error
        }
        return response(null, Response::HTTP_OK); 
    }
}
