<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Http\Requests\ScoreRequest;
use App\Http\Requests\GameResource;
use Illuminate\Http\Request;
use App\Game;

class Games extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the games
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request) : GameResource
    {
        //get all the request data
        //returns an array of all data the user sent
        $data = $request->all();


        //store game in variable
        $game = Game::create($data);

        // return the resource
        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game) : GameResource
    {
        // return the resource
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function score(GameRequest $request, Game $game)
    {
        if (!$game->complete()) {
            $game->score($request->get("player"));
        }

        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game) : Response
    {   
        // delete the game from the DB
        $game->delete();

        // use a 204 code as there is on content in the response
        return response(null,204);
    }
}
