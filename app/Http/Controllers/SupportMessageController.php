<?php

namespace App\Http\Controllers;
use App\Models\SupportMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportMessageController extends Controller
{
    public function showSupportForm()
    {
        return view('user.support-form');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        SupportMessage::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully.');
    }

    public function showMessages()
    {
        $messages = SupportMessage::with('user')->latest()->paginate(10);

        return view('admin.support-messages', compact('messages'));
    }

    public function replyMessage(Request $request, SupportMessage $supportMessage)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        $supportMessage->update([
            'reply' => $request->reply,
            'is_replied' => true,
        ]);

        return back()->with('success', 'Reply sent successfully.');
    }
}
