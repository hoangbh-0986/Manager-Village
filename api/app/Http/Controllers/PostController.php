<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResourcesPost;

class PostController extends Controller
{
    public function GetPost()
    {

        $post = Post::with('author')->get();

        return ResourcesPost::collection($post);
        // return $post;
    }

    public function CreatePost(Request $request) {
        $id = Auth::id();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author_id' => $id,
            'craft_village_id' => $request->get('craft_village_id'),
            'job_id' => $request->get('job_id'),
            'expert_id' => $request->get('expert_id'),
        ]);
        $post->save();
        return response()->json([
            'messege' => 'Succsess create new post',
        ], 201);
    }

    public function DetailPost($id)
    {
        $post = Post::with('author')->find($id);

        return new ResourcesPost($post);
    }

    public function UpdatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->author_id = $request->get('author_id');
        $post->craft_village_id = $request->get('craft_village_id');
        $post->job_id = $request->get('job_id');
        $post->expert_id = $request->get('expert_id');
        $post->save();

        return $post;
    }

    public function DeletePost($id)
    {
        $post = Post::find($id);

        return response()->json([
            'success' => (bool) ($post->delete()),
        ]);
    }

    public function DetailPostJob($id)
    {
        $post = Post::with('author')->where('job_id', $id)->first();

        return new ResourcesPost($post);
    }


    public function DetailPostExpert($id)
    {
        $post = Post::with('expert')->where('expert_id', $id)->first();

        return new ResourcesPost($post);
    }


    public function DetailPostWard($id)
    {
        $post = Post::with('ward')->where('ward_id', $id)->first();

        return new ResourcesPost($post);
    }


    public function DetailPostJCraftVillage($id)
    {
        $post = Post::with('craftVillage')->where('craft_village_id', $id)->first();

        return new ResourcesPost($post);
    }
}
