<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function GetJob()
    {
        return Job::orderBy('created_at', 'asc')
            ->paginate(20);
    }

    public function CreateJob(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|string',
        ]);

        $job = new Job([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
        ]);
        $job->save();
        return  response()->json([
            'ward' => $job,
        ]);
    }

    public function DetailJob($id)
    {
        $job = Job::find($id);

        return $job;
    }

    public function UpdateJob(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|string',
        ]);

        $ward = Ward::find($id);
        $ward->name = $request->get('name');
        $ward->phone = $request->get('phone');
        $ward->email = $request->get('email');
        $ward->save();

        return $ward;
    }

    public function DeleteJob($id)
    {
        $ward = Ward::find($id);

        return response()->json([
            'success' => (bool) ($ward->delete()),
        ]);
    }
}
