<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::with('hotel')->latest();

        // filter berdasarkan hotel
        if ($request->hotel_id) {
            $rooms->where('hotel_id', $request->hotel_id);
        }

        // pencarian berdasarkan type atau fasilitas
        if ($request->keyword) {
            $rooms->where(function ($query) use ($request) {
                $query->where('type', 'like', '%'.$request->keyword.'%')
                    ->orWhere('facilities', 'like', '%'.$request->keyword.'%');
            });
        }

        return view('room.index', [
            'title' => 'Room',
            'rooms' => $rooms->paginate(5)->withQueryString(),
            'hotels' => Hotel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create', [
            'title' => 'Create Room',
            'hotels' => Hotel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'type' => 'required',
            'price' => 'required|numeric',
            'capacity' => 'required|numeric',
            'facilities' => 'required',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        Room::create($request->all());

        return redirect()->route('room.index')->with('success', 'Data Room Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('room.edit', [
        'title' => 'Edit Room',
        'room' => $room,
        'hotels' => Hotel::all(),
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
         $request->validate([
        'room_number' => 'required|unique:rooms,room_number,' . $room->id,
        'type' => 'required',
        'price' => 'required|numeric',
        'capacity' => 'required|numeric',
        'facilities' => 'required',
        'hotel_id' => 'required|exists:hotels,id',
    ]);

    $room->update($request->all());

    return redirect()->route('room.index')->with('success', 'Data Room Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

    return redirect()->route('room.index')->with('success', 'Data Room Berhasil Dihapus');
    }
}
