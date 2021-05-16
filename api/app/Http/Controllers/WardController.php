<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ward;

class WardController extends Controller
{
    public function GetWard()
    {
        return Ward::orderBy('created_at', 'asc')
            ->paginate(20);
    }

    public function CreateWard(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|string',
        ]);

        $ward = new Ward([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
        ]);
        $ward->save();
        return  response()->json([
            'ward' => $ward,
        ]);
    }

    public function DetailWard($id)
    {
        $ward = Ward::find($id);

        return $ward;
    }

    public function UpdateWard(Request $request, $id)
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

    public function DeleteWard($id)
    {
        $ward = Ward::find($id);

        return response()->json([
            'success' => (bool) ($ward->delete()),
        ]);
    }
}
