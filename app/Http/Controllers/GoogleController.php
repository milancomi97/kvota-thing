<?php

namespace App\Http\Controllers;

use App\Services\GoogleAnalyticsService;
use Throwable;

class GoogleController extends Controller
{
    public function __construct(private GoogleAnalyticsService $ga) {}

    // AdminLTE dashboard view
    public function dashboard()
    {
        $error = null;
        $summary = [
            'activeUsers' => 0,
            'newUsers'    => 0,
            'sessions'    => 0,
            'eventCount'  => 0,
        ];

        try {
            // brzi sanity check
            if (!config('services.ga.property_id')) {
                throw new \RuntimeException('GA_PROPERTY_ID nije podešen u .env');
            }
            $summary = array_merge($summary, $this->ga->summaryLast30Days());
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }

        return view('analytics.dashboard', compact('summary', 'error'));
    }

    // JSON ping za direktnu proveru API-ja
    public function ping()
    {
        try {
            return response()->json([
                'property' => config('services.ga.property_id'),
                'summary'  => $this->ga->summaryLast30Days(),
                'status'   => 'ok',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    // JSON za grafikon (AJAX)
    public function dailyUsers()
    {
        return response()->json($this->ga->dailyUsersLast30Days());
    }

    public function topPages()
    {
        return response()->json($this->ga->topPagesLast30Days());
    }

    // app/Http/Controllers/GoogleController.php
    public function realtime()
    {
        try {
            return response()->json([
                'activeUsers' => $this->ga->realtimeActiveUsers(),
                'status' => 'ok',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

}
