<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'poster' => $this->poster,
            'views' => $this->views,
            'created_at' => $this->created_at->diffForHumans(),
            'categories' => $this->categories,
            'author' => new UserResource($this->user),
        ];
    }
}
