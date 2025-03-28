<?php

namespace App\Http\Controllers;

use App\Models\ShortUrlExpires;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShortUrlController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $shortCode = Str::random(6);
        $expiresAt = Carbon::now()->addDays(1);

        $shortUrl = ShortUrlExpires::create([
            'original_url' => $request->url,
            'short_code' => $shortCode,
            'expires_at' => $expiresAt,
        ]);

        return response()->json([
            'short_url' => url($shortCode),
        ]);
    }

    public function redirect($code)
    {
        $shortUrl = ShortUrlExpires::where('short_code', $code)->where('expires_at', '>', Carbon::now())->firstOrFail();
        return redirect($shortUrl->original_url);
    }
}
