<?php

namespace App\Http\Controllers;

use App\Http\Requests\BodyPart\StoreBodyPartRequest;
use App\Http\Requests\BodyPart\UpdateBodyPartRequest;
use App\Http\Resources\BodyPartResource;
use App\Models\BodyPart;

class BodyPartController extends Controller
{
    public function index()
    {
        return BodyPartResource::collection(BodyPart::all());
    }

    public function show(BodyPart $bodyPart)
    {
        return new BodyPartResource($bodyPart);
    }

    public function store(StoreBodyPartRequest $request)
    {
        $bodyPart = BodyPart::create($request->validated());
        return new BodyPartResource($bodyPart);
    }

    public function update(UpdateBodyPartRequest $request, BodyPart $bodyPart)
    {
        $bodyPart->update($request->validated());
        return new BodyPartResource($bodyPart);
    }

    public function destroy(BodyPart $bodyPart)
    {
        $bodyPart->delete();
        return response()->json(null, 204);
    }
}
