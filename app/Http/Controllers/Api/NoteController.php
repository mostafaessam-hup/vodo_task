<?php
namespace App\Http\Controllers\Api;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class NoteController extends Controller
{
    public function index(Request $request, $usersId)
    {
        return Note::where('users_id', $usersId)->get();
    }

    public function show($usersId, $id)
    {
        $Note = Note::find($id);
        if (!$Note) {
            return response()->json(['status' => 'note not found'], Response::HTTP_NOT_FOUND);
        }

        $usersId = (int)$usersId;
        if ($Note->users_id !== $usersId) {
            return response()->json(['status' => 'invalid data'], Response::HTTP_BAD_REQUEST);
        }
        return Note::find($id) ??
            response()->json(['status' => 'not found'], Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request, $usersId)
    {
        $Note = new Note();
        $Note->note = $request->get('note');
        $Note->users_id = $usersId;
        $Note->save();

        return $Note;
    }

    public function update(Request $request, $usersId, $id)
    {
        $Note = Note::find($id);

        if (!$Note) {
            return response()->json(['status' => 'note not found'], Response::HTTP_NOT_FOUND);
        }

        $usersId = (int)$usersId;
        if ($Note->users_id !== $usersId) {
            return response()->json(['status' => 'invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $Note->note = $request->get('note');
        $Note->save();

        return $Note;
    }

    public function delete(Request $request, $usersId, $id)
    {
        $Note = Note::find($id);
        if (!$Note) {
            return response()->json(['status' => 'note not found'], Response::HTTP_NOT_FOUND);
        }
        $usersId=(int)$usersId;
        if ($Note->users_id != $usersId) {
            return response()->json(['status' => 'invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $Note->delete();
        return response()->json(['status' => 'deleted'], Response::HTTP_OK);
    }
}
