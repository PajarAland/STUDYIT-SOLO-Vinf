<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        // Ambil user berdasarkan user_id
        $user = User::find($validated['user_id']);

        if ($user->user_type !== 'free user') {
            return response()->json([
                'message' => 'Payment not allowed for this user type',
            ], 403);
        }

        // Simpan data pembayaran ke tabel enrolls
        $enroll = Enroll::create($validated);

        // Perbarui user_type menjadi 'subscriber'
        $user->user_type = 'subscriber';
        $user->save();

        return response()->json([
            'message' => 'Payment successfully processed and user upgraded to subscriber',
            'enroll' => $enroll,
            'user' => $user
        ], 201);
    }
}
