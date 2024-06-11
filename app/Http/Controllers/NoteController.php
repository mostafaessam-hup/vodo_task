<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Yajra\DataTables\DataTables;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{


    public function index()
    {
        return view('dashboard.notes.index');
    }

    public function dataTable()
    {
        $query = Note::select('*');
        return  DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $btn = '
                        <a href="' . Route('notes.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>

                        <button type="button" id="deleteBtn"  data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-toggle="modal"
                        data-original-title="test" data-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })

            ->addColumn('note', function ($row) {
                return $row->note;
            })

            ->rawColumns(['action', 'note'])
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.notes.create');
    }

    public function store(NoteRequest $request)
    {
        return Note::create($request);
        return redirect()->route('dashboard.notes.index')->with('success', 'تمت الاضافة بنجاح');
    }



    public function update(NoteRequest $request, string $id)
    {
        $note = $this->getById($id);
        return $note->update($request);
        return redirect()->route('dashboard.notes.index')->with('success', 'تمت التعديل بنجاح');
    }

    public function delete(NoteRequest $request, $id)
    {
        $note = $this->getById($id);
        return $note->delete();
    }

    public function getById($id)
    {
        $query = Note::where('id', $id);
        return  $query->firstOrfail();
    }
}
