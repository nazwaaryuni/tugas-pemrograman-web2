<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
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
                $query->where('type', 'like', '%' . $request->keyword . '%')
                      ->orWhere('facilities', 'like', '%' . $request->keyword . '%');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
