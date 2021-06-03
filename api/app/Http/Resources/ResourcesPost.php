<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Parsedown;

class ResourcesPost extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $Parsedown = new Parsedown();

        return [
          'id' => $this->id,
          'title' => $this->title,
          'content' => $Parsedown->text($this->content),
          'author_id' => $this->author_id,
          'craft_village_id' => $this->craft_village_id,
          'job_id' => $this->job_id,
          'expert_id' => $this->expert_id,
          'short_content' => $this->shortContent(),
          'author' => $this->author,
        ];
    }
}
