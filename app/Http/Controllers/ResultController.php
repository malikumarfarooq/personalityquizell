<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Result $result)
    {
        // Ensure user can view this result
        // You might want to add additional authorization logic here


        if ($result->user_id !== auth()->id()) {
            abort(403);
        }

        return view('results.show', compact('result'));
    }
}
