<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWorkoutDetailRequest;
use App\Http\Requests\WorkoutDetail\StoreWorkoutDetailRequest;
use App\Http\Resources\WorkoutDetailResource;
use App\Models\WorkoutDetail;
use Illuminate\Http\Request;

class WorkoutDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return WorkoutDetailResource::collection(WorkoutDetail::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkoutDetailRequest $request)
    {
        $workoutDetail = WorkoutDetail::create($request->validated());
        return new WorkoutDetailResource($workoutDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkoutDetail $workoutDetail)
    {
        return new WorkoutDetailResource($workoutDetail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutDetailRequest $request, WorkoutDetail $workoutDetail)
    {
        $workoutDetail->update($request->validated());
        return new WorkoutDetailResource($workoutDetail);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkoutDetail $workoutDetail)
    {
        $workoutDetail->delete();
        return response()->json(null, 204);
    }
}
