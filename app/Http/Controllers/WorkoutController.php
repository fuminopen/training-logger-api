<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workout\StoreWorkoutRequest;
use App\Http\Requests\Workout\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkoutResource::collection(Workout::all());
    }

    public function store(StoreWorkoutRequest $request)
    {
        $workout = Workout::create($request->validated());
        return new WorkoutResource($workout);
    }

    public function show(Workout $workout)
    {
        return new WorkoutResource($workout);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        $workout->update($request->validated());
        return new WorkoutResource($workout);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        $workout->delete();
        return response()->json(null, 204);
    }
}
