<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Parsedown;

class CraftVilageResources extends JsonResource
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
          'name' => $this->name,
          'post' => [
            'title' => $this->posts[0]->title,
            'content' => $Parsedown->text($this->posts[0]->content),
            'author_id' => $this->posts[0]->author_id,
            'craft_village_id' => $this->posts[0]->craft_village_id,
            'job_id' => $this->posts[0]->job_id,
            'expert_id' => $this->posts[0]->expert_id,
          ],
        ];
    }
}
