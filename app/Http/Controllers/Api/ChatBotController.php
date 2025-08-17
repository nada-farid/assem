<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatResponse;

class ChatBotController extends Controller
{
    public function reply(Request $request)
    {
        $message = $request->query('message');

        if (!$message) {
            return response()->json(['reply' => 'من فضلك اكتب رسالة.']);
        }

      
        $response = ChatResponse::where('keyword', 'LIKE', '%' . $message . '%')->first();

        if ($response) {
            return response()->json(['reply' => $response->response]);
        }

       
        $responses = ChatResponse::all();
        $bestMatch = null;
        $shortest = -1;

        foreach ($responses as $res) {
            $lev = levenshtein(mb_strtolower($message), mb_strtolower($res->keyword));
            if ($lev == 0) {
                // تطابق تام
                $bestMatch = $res;
                $shortest = 0;
                break;
            }
            if ($lev <= $shortest || $shortest < 0) {
                $bestMatch = $res;
                $shortest = $lev;
            }
        }

        if ($bestMatch && $shortest < 3) { 
            return response()->json(['reply' => $bestMatch->response]);
        }

        return response()->json(['reply' =>  $reply = 'لم أفهم سؤالك 🤔، يمكنك التواصل معنا على الواتساب.']);
    }
    public function quickReplies()
    {
        $quickReplies = ChatResponse::where('is_quick', true)->get(['id','keyword']);
        return response()->json($quickReplies);
    }
}
