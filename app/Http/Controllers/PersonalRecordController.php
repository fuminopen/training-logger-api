<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalRecord\StorePersonalRecordRequest;
use App\Http\Requests\PersonalRecord\UpdatePersonalRecordRequest;
use App\Http\Resources\PersonalRecordResource;
use App\Models\PersonalRecord;

class PersonalRecordController extends Controller
{
    public function index()
    {
        return PersonalRecordResource::collection(PersonalRecord::with(['user', 'exercise'])->get());
    }

    public function show(PersonalRecord $personalRecord)
    {
        return new PersonalRecordResource($personalRecord->load(['user', 'exercise']));
    }

    public function store(StorePersonalRecordRequest $request)
    {
        $personalRecord = PersonalRecord::create($request->validated());
        return new PersonalRecordResource($personalRecord->load(['user', 'exercise']));
    }

    public function update(UpdatePersonalRecordRequest $request, PersonalRecord $personalRecord)
    {
        $personalRecord->update($request->validated());
        return new PersonalRecordResource($personalRecord->load(['user', 'exercise']));
    }

    public function destroy(PersonalRecord $personalRecord)
    {
        $personalRecord->delete();
        return response()->json(null, 204);
    }
}