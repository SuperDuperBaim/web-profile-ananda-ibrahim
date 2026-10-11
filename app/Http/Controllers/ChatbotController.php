<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        try {
            // Laravel yang menembak FastAPI di laptop ASUS (aman dari blokir browser & CORS)
            $fastApiUrl = env('FASTAPI_URL', 'http://192.168.1.39:8001/chat');
            $response = Http::timeout(15)->post($fastApiUrl, [
                'message' => $userMessage
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(['reply' => 'Gagal mendapatkan balasan dari AI.']);
        } catch (\Exception $e) {
            return response()->json(['reply' => 'Koneksi ke server FastAPI terputus atau belum aktif.']);
        }
    }
}
