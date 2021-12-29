<?php

namespace App\Http\Controllers;

use App\Classes\Upload;
use App\Models\Game_categories;
use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $games = Games::with('category')->latest();

        if (request()->has('game')) {
            $games = $games->where('game_name', 'LIKE', '%' . request()->game . '%');
        }
        
        $games = $games->paginate(10);
        return view('Games.index', compact('games'));
    }

    public function create()
    {
        $categories = Game_categories::all();
        return view('Games.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "game_name" => "required",
            "game_image" => "required",
            "game_category_id" => "required",
        ]);

        $game = Games::create($request->all());
        $game->game_image = Upload::uploadFile($request, 'game_image');
        $game->save();
        return redirect('anggota/games')->with('success', 'Game has been added');
    }

    public function show($id)
    {
        $games = Games::find($id);
        return view('Games.show', compact('games'));
    }

    public function edit($id)
    {
        $games = Games::find($id);
        $categories = Game_categories::all();
        return view('Games.edit', compact('games', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $game = Games::find($id);
        $gameUpdate = $game;
        $game->update($request->all());
        if ($request->hasFile('game_image')) {
            $gameUpdate->game_image = Upload::uploadFile($request, 'game_image');
            $gameUpdate->save();
        }

        return redirect('anggota/games')->with('success', 'Game has been updated');
    }

    public function destroy($id)
    {
        Games::find($id)->delete();
        return redirect('anggota/games')->with('success', 'Game has been deleted');
    }
}
