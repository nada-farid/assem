<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatResponse;
use Illuminate\Http\Request;

class ChatResponseController extends Controller
{
    public function index()
    {
        $responses = ChatResponse::latest()->paginate(10);
        return view('admin.chat_responses.index', compact('responses'));
    }

    public function create()
    {
        return view('admin.chat_responses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
            'response' => 'required|string',
        ]);

        ChatResponse::create($request->all());

        return redirect()->route('admin.chat-responses.index')
                         ->with('success', 'تم إضافة الرد بنجاح ✅');
    }

    public function edit(ChatResponse $chatResponse)
    {
        return view('admin.chat_responses.edit', compact('chatResponse'));
    }

    public function update(Request $request, ChatResponse $chatResponse)
    {
        $request->validate([
            'keyword' => 'required|string|max:255',
            'response' => 'required|string',
        ]);

        $chatResponse->update($request->all());

        return redirect()->route('admin.chat-responses.index')
                         ->with('success', 'تم تعديل الرد بنجاح ✅');
    }

    public function destroy(ChatResponse $chatResponse)
    {
        $chatResponse->delete();
        return redirect()->route('chat-responses.index')
                         ->with('success', 'تم حذف الرد بنجاح 🗑️');
    }
}
