<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function GetJob()
    {
        // return Job::orderBy('created_at', 'asc')
        //     ->paginate(20);
        $job = Job::with('posts')->get();
        return  response()->json([
            'jobs' => $job,
        ]);
    }

    public function CreateJob(Request $request) {
        $request->validate([
            'name' => 'required',
            'year_create' => 'required',
            'ancestor' => 'required',
            'note' => 'required',
        ]);

        $job = new Job([
            'name' => $request->get('name'),
            'year_create' => $request->get('year_create'),
            'ancestor' => $request->get('ancestor'),
            'note' => $request->get('note'),
        ]);
        $job->save();
        return  response()->json([
            'ward' => $job,
        ]);
    }

    public function DetailJob($id)
    {
        // $job = Job::find($id);

        // return $job;
        $job = Job::with('posts')->find($id);

        return $job;
    }

    public function UpdateJob(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'year_create' => 'required',
            'ancestor' => 'required',
            'note' => 'required',
        ]);


        $job = Job::find($id);
        $job->name = $request->get('name');
        $job->year_create = $request->get('year_create');
        $job->ancestor = $request->get('ancestor');
        $job->note = $request->get('note');
        $job->save();

        return $job;
    }

    public function DeleteJob($id)
    {
        $job = Job::find($id);

        return response()->json([
            'success' => (bool) ($job->delete()),
        ]);
    }
}
