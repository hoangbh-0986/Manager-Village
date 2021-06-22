<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class FeedbackController extends Controller
{
    public function GetFeedback()
    {
        $feedback = Contact::get();
        return  response()->json([
            'feedbacks' => $feedback,
        ]);
    }

    public function CreateFeedback(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|string',
            'title' => 'required',
            'phone' => 'required|numeric',
            'content' => 'required',
        ]);

        $feedback = new Contact([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'content' => $request->get('content'),
        ]);
        $feedback->save();
        return  response()->json([
            'feedback' => $feedback,
        ]);
    }

    public function DetailFeedback($id)
    {
        $feedback = Contact::find($id);
        return $feedback;
    }

    public function DeleteFeedback($id)
    {
        $feedback = Contact::find($id);

        return response()->json([
            'success' => (bool) ($feedback->delete()),
        ]);
    }

}
