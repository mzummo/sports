<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class TeamController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();
    
        return response(null, Response::HTTP_OK);
    }

    public function create(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return response($team->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index(Request $request, $id = null)
    {
        if ($id) {
            $team = Team::findOrFail($id);
            return response()->json($team->toArray());
        } 
        return response(Team::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function players(Request $request, $id = null) {
        $team = Team::findOrFail($id);
        return response($team->players()->get()->toArray(), Response::HTTP_OK);
    }
}
