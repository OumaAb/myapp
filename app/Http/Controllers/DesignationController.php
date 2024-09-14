<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        Designation::create([
            'designation' => $request->designation,
            'quantity' => $request->quantity,
        ]);

        // Redirect to justification page
        return redirect()->route('justification.create');
    }
}

