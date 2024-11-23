<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\StudentResource;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::latest()->get();
        return response()->json(StudentResource::collection($students));
    }

    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->validated());
        return response()->json(new StudentResource($student), 201);
    }

    public function show(Student $student): JsonResponse
    {
        return response()->json(new StudentResource($student));
    }

    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->update($request->validated());
        return response()->json(new StudentResource($student));
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return response()->json(null, 204);
    }
}