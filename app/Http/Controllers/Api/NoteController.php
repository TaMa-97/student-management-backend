<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use App\Http\Requests\StoreNoteRequest;

class NoteController extends Controller
{
    public function index(Student $student): JsonResponse
    {
        $notes = $student->notes()->latest()->get();
        return response()->json(NoteResource::collection($notes));
    }

    public function store(StoreNoteRequest $request, Student $student): JsonResponse
    {
        $note = $student->notes()->create($request->validated());
        return response()->json(new NoteResource($note), 201);
    }
}