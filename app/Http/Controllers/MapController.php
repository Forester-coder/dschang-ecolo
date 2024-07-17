<?php

namespace App\Http\Controllers;

use App\Models\Depotoir;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        $depotoirs = Depotoir::select('latitude', 'longitude')->get();

        return view('depotoirs.map', compact('depotoirs'));
    }
}
