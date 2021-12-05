<?php

namespace App\Http\Controllers;

use App\Models\Event_winner;
use Illuminate\Http\Request;

class Event_winnerController extends Controller
{
    public function index()
    {
        $event_winner = Event_winner::all();
        return view('event_winner.index', compact('event_winner'));
    }

    public function create()
    {
        return view('event_winner.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_event_winner' => 'required',
            'event_id' => 'required',
            'squad_id' => 'required',
        ]);
        Event_winner::create($request->all());
        return redirect('event_winner.index')
            ->with('success', 'Event winner created successfully');
    }

    public function show($id)
    {
        $event_winner = Event_winner::find($id);
        return view('event_winner.show', compact('event_winner'));
    }

    public function edit($id)
    {
        $event_winner = Event_winner::find($id);
        return view('event_winner.edit', compact('event_winner'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'event_id' => 'required',
            'user_id' => 'required',
            'winner_id' => 'required',
            'winner_type' => 'required',
            'winner_name' => 'required',
            'winner_image' => 'required',
            'winner_description' => 'required',
            'winner_date' => 'required',
            'winner_time' => 'required',
            'winner_location' => 'required',
            'winner_status' => 'required',
        ]);
        Event_winner::find($id)->update($request->all());
        return redirect('event_winner.index')
            ->with('success', 'Event winner updated successfully');
    }

    public function destroy($id)
    {
        Event_winner::find($id)->delete();
        return redirect('event_winner.index')
            ->with('success', 'Event winner deleted successfully');
    }
}
