<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;

class ExpertController extends Controller
{
    public function GetExpert()
    {
        // return Expert::orderBy('created_at', 'asc')
        //     ->paginate(20);
        $expert = Expert::with('posts')->get();
        return  response()->json([
            'experts' => $expert,
        ]);
    }

    public function CreateExpert(Request $request) {
        $request->validate([
            'name' => 'required',
            'year_of_birth' => 'required',
            'craft_village_id' => 'required',
            'job_id' => 'required',
        ]);

        $expert = new Expert([
            'name' => $request->get('name'),
            'year_of_birth' => $request->get('year_of_birth'),
            'year_died' => $request->get('year_died'),
            'craft_village_id' => $request->get('craft_village_id'),
            'job_id' => $request->get('job_id'),
        ]);
        $expert->save();
        return  response()->json([
            'expert' => $expert,
        ]);
    }

    public function DetailExpert($id)
    {
        // $expert = Expert::find($id);

        // return $expert;
        $expert = Expert::with('posts')->find($id);

        return $expert;
    }

    public function UpdateExpert(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'year_of_birth' => 'required',
            'craft_village_id' => 'required',
            'job_id' => 'required',
        ]);

        $expert = Expert::find($id);
        $expert->name = $request->get('name');
        $expert->year_of_birth = $request->get('year_of_birth');
        $expert->year_died = $request->get('year_died');
        $expert->craft_village_id = $request->get('craft_village_id');
        $expert->job_id = $request->get('job_id');
        $expert->save();

        return $expert;
    }

    public function DeleteExpert($id)
    {
        $expert = Expert::find($id);

        return response()->json([
            'success' => (bool) ($expert->delete()),
        ]);
    }
}
