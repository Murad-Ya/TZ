<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResources extends JsonResource
{
public function toArray(Request $request)
{
    return TaskResource::collection($this->resource);
}
}
