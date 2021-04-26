<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Models\notes;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|max:30',
            'text' => 'required|max:100',
        ]);

        Post::updateOrCreate(['id' => $request->id],
            $request->only( ['heading', 'text'] ));

    }

}
