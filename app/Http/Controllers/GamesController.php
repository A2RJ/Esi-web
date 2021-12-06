<?php

namespace App\Http\Controllers;

use App\Models\Game_categories;
use App\Models\Games;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $games = Games::with('category')
            ->paginate(10);
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $categories = Game_categories::all();
        return view('games.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "game_name" => "required",
            "game_image" => "required",
            "game_category_id" => "required",
        ]);

        Games::create($request->all());
        return redirect('/games')->with('success', 'Game has been added');
    }

    public function show($id)
    {
        $games = Games::find($id);
        return view('games.show', compact('games'));
    }

    public function edit($id)
    {
        $games = Games::find($id);
        $categories = Game_categories::all();
        return view('games.edit', compact('games', 'categories'));
    }

    public function update(Request $request, $id)
    {
        Games::find($id)->update($request->all());
        return redirect('/games')->with('success', 'Game has been updated');
    }

    public function destroy($id)
    {
        Games::find($id)->delete();
        return redirect('/games')->with('success', 'Game has been deleted');
    }
}
