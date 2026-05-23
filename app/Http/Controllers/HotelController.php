<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $hotels = Hotel::latest();
    $keyword = request('keyword');

    if ($keyword) {
        $hotels->where('name', 'like', '%' . $keyword . '%')
               ->orWhere('city', 'like', '%' . $keyword . '%');
    }
    
    return view('hotel.index', [
        'title' => 'Hotel',
        'hotels' => $hotels->paginate(2)->withQueryString(),
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.create', [
        'title' => 'Create Hotel',
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required|min:10',
        'city' => 'required|max:100',
    ], [
        'name.required' => 'Nama Hotel Wajib Diisi',
        'name.max' => 'Nama Hotel Maksimal 255 Karakter',
        'address.required' => 'Alamat Wajib Diisi',
        'address.min' => 'Alamat Minimal 10 Karakter',
        'city.required' => 'Kota Wajib Diisi',
        'city.max' => 'Kota Maksimal 100 Karakter',
    ]);

    Hotel::create($validated);

    return to_route('hotel.index')->withSuccess('Data Hotel Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
         return view('hotel.edit', [
        'title' => 'Edit Hotel',
        'hotel' => $hotel,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
         $validated = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required|min:10',
        'city' => 'required|max:100',
    ], [
        'name.required' => 'Nama Hotel Wajib Diisi',
        'name.max' => 'Nama Hotel Maksimal 255 Karakter',
        'address.required' => 'Alamat Wajib Diisi',
        'address.min' => 'Alamat Minimal 10 Karakter',
        'city.required' => 'Kota Wajib Diisi',
        'city.max' => 'Kota Maksimal 100 Karakter',
    ]);

    $hotel->update($validated);

    return to_route('hotel.index')->withSuccess('Data Hotel Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return to_route('hotel.index')->withSuccess('Data Hotel Berhasil Dihapus');
    }
}
