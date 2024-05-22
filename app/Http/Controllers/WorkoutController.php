<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workout\StoreWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;

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
