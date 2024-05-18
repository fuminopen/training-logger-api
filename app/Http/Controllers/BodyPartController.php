<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBodyPartRequest;
use App\Http\Resources\BodyPartResource;
use App\Models\BodyPart;

class BodyPartController extends Controller
{
    public function index()
    {
        return BodyPartResource::collection(BodyPart::all());
    }

    public function store(StoreBodyPartRequest $request)
    {
        $bodyPart = BodyPart::create($request->validated());
        return new BodyPartResource($bodyPart);
    }
}
