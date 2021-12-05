<?php
namespace App\Http\Controllers;

use App\Models\Game_categories;
use Illuminate\Http\Request;

class Game_categoriesController extends Controller
{
    public function index()
    {
        $game_categories = Game_categories::all();
        return view('game_categories.index', compact('game_categories'));
    }

    public function create()
    {
        return view('game_categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        Game_categories::create($request->all());
        return redirect()->route('game_categories.index')->with('success', 'Game_categories created successfully');
    }

    public function show($id)
    {
        $game_categories = Game_categories::find($id);
        return view('game_categories.show', compact('game_categories'));
    }

    public function edit($id)
    {
        $game_categories = Game_categories::find($id);
        return view('game_categories.edit', compact('game_categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        Game_categories::find($id)->update($request->all());
        return redirect()->route('game_categories.index')->with('success', 'Game_categories updated successfully');
    }

    public function destroy($id)
    {
        Game_categories::find($id)->delete();
        return redirect()->route('game_categories.index')->with('success', 'Game_categories deleted successfully');
    }
}