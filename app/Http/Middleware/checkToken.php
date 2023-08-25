<?php

namespace App\Http\Middleware;

use App\Models\societiesModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $societies = societiesModel::where('login_tokens', $request->token)->first();
       if($societies)
       {
        return $next($request);
       } else{
        return response()->json([
            'message' => 'user tidak ditemulan'
        ]);
       }
    }
}
