<?php

namespace App\Http\Controllers;

use App\Models\Justification;
use Illuminate\Http\Request;
    
    class JustificationController extends Controller
    {
        public function create()
        {
            return view('justifications.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'justification' => 'required|string|max:255',
            ]);
    
            Justification::create([
                'designation_id' => $request->designation_id,  // assuming you have this in the request
                'justification' => $request->justification,
            ]);
    
            return redirect()->route('home')->with('success', 'Justification saved successfully.');
        }
    }
    
