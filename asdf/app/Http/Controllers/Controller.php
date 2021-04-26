<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function note(){
        return response()->json(notes::get(), 200);
    }
    public function Note_check(Request $request)
    {
        $note = new notes();
        $note->heading = $request->input('heading');
        $note->text =$request->input('text');
        $note->email = 'email';
        $note->save();
    }


    public function noteById($id) {
        $note = notes::find($id);
        if ( is_null($note) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        return response()->json($note, 200);
    }

    public function noteSave(Request $req) {
        $validator = Validator::make($req->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $note = CountryModel::create($req->all());
        return response()->json($note, 201);
    }

    public function noteEdit(Request $req, $id) {

        $validator = Validator::make($req->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $note = notes::find($id);
        if ( is_null($note) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $note->update($req->all());
        return response()->json($note, 200);
    }

    public function noteDelete(Request $req, $id) {
        $note = notes::find($id);
        if ( is_null($note) ) {
            return response()->json(['error' => true, 'message' => 'Not found'], 404);
        }
        $note->delete();
        return response()->json('', 204);
    }

}

