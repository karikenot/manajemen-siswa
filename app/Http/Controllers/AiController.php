<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function tanyaAi(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string',
            'prompt' => 'nullable|string'
        ]);

        $pesanUser = $request->input('pesan');
        $systemPrompt = $request->input('prompt', 'You are a sweet, caring, cute, and chill online friend/partner on Discord. Reply naturally, casually, and keep responses short in English.');
        $promptKustom = $systemPrompt . " User message: " . $pesanUser;

        // Ambil API Key dari config atau env
        $apiKey = config('services.gemini.key') ?? env('GEMINI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'GEMINI_API_KEY is not set in .env file'
            ], 500);
        }

        // Endpoint resmi Gemini 2.5 Flash
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash-lite:generateContent?key=" . $apiKey;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $promptKustom]
                    ]
                ]
            ]
        ]);

        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'jawaban' => $response->json('candidates.0.content.parts.0.text')
            ]);
        }

        // Mengembalikan detail error asli dari API Google
        return response()->json([
            'status' => 'error',
            'message' => $response->json()
        ], $response->status() ?: 500);
    }
}