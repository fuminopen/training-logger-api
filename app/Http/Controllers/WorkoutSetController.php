<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkoutSet\StoreWorkoutSetRequest;
use App\Http\Resources\WorkoutSetResource;
use App\Models\WorkoutSet;
use Illuminate\Http\Request;

class WorkoutSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkoutSetResource::collection(WorkoutSet::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkoutSetRequest $request)
    {
        $workoutSet = WorkoutSet::create($request->validated());
        return new WorkoutSetResource($workoutSet);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkoutSet $workoutSet)
    {
        return new WorkoutSetResource($workoutSet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
