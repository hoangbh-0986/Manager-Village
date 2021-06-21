<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CraftVillage;
use App\Models\DetailCraftVillage;
use App\Http\Resources\CraftVilageResources;

class CraftVillageController extends Controller
{
    public function GetCraftVillage()
    {
        $craftVillage = CraftVillage::with('posts')->get();
        return  response()->json([
            'craftVillage' => $craftVillage,
        ]);
    }

    public function CreateCraftVillage(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'create_year' => 'required|date',
            'email' => 'required|email|string',
            'ward_id' => 'required',
        ]);

        $craftVillage = new CraftVillage([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'create_year' => $request->get('create_year'),
            'email' => $request->get('email'),
            'ward_id' => $request->get('ward_id'),
        ]);
        $craftVillage->save();
        return  response()->json([
            'craftVillage' => $craftVillage,
        ]);
    }

    public function DetailCraftVillage($id)
    {
        // $craftVillage = CraftVillage::with('detailCaftVillage')->find($id);
        // return $craftVillage;
        $post = CraftVillage::with('posts')->find($id);

        return new CraftVilageResources($post);
    }

    public function UpdateCraftVillage(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'create_year' => 'required|date',
            'email' => 'required|email|string',
            'ward_id' => 'required',
        ]);

        $craftVillage = CraftVillage::find($id);
        $craftVillage->name = $request->get('name');
        $craftVillage->phone = $request->get('phone');
        $craftVillage->create_year = $request->get('create_year');
        $craftVillage->email = $request->get('email');
        $craftVillage->ward_id = $request->get('ward_id');
        $craftVillage->save();

        return $craftVillage;
    }

    public function DeleteCraftVillage($id)
    {
        $craftVillage = CraftVillage::with('detailCaftVillage')->find($id);

        return response()->json([
            'success' => (bool) ($craftVillage->delete()),
        ]);
    }

    public function getPostByCraftVilage($id)
    {
        $post = CraftVillage::with('posts')->find($id);

        return $post;
    }
}
