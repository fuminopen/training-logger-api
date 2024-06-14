<?php

namespace App\Http\Controllers;

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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
