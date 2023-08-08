<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiDataLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    private $startTime;

    public function handle(Request $request, Closure $next): Response
    {
        $this->startTime = microtime(true);
        return $next($request);
    }
    public function terminate($request, $response)
    {
        if ( env('API_DATALOGGER', true) ) 
        {
            $endTime = microtime(true);
            $filename = 'api_datalogger_' . date('Y_m_d') . '.log';
            $dataToLog  = 'Time: '   . gmdate("F j, Y, g:i:s a") . "\n";
            $dataToLog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n";
            $dataToLog .= 'IP Address: ' . $request->ip() . "\n";
            $dataToLog .= 'URL: '    . $request->fullUrl() . "\n";
            $dataToLog .= 'Method: ' . $request->method() . "\n";
            $dataToLog .= 'Input: '  . $request->getContent() . "\n";
            $dataToLog .= 'Output: ' . $response->getContent() . "\n";
            \File::append( storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat("=", 20) . "\n\n");
        }
     }


}
