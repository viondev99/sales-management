<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Đặt các tiêu đề CORS vào đối tượng Response
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Cho phép tất cả các nguồn
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS'); // Cho phép các phương thức
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization'); // Cho phép các header

        return $response;
    }
}
