<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function tanyaAi9(Request $request){
        $request->validate([
            'pesan' => 'required|string'
        ]);

        $apiKey = env('GEMINI_API_KEY');
        $pesanUser = $request->input('pesan');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post("https://googleapis.com{$apiKey}", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $pesanUser]
                    ]
                ]
            ]
        ]);

        if($response->successful()){
            $hasil = $response->json('candidates.0.content.parts.0.text');
            return response()->json(['status' => 'success', 'jawaban' => $hasil]);
        }

        return response()->json(['status' => 'error', 'message' => 'gagal terhubung'], 500);
    }
}
