<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;

class GoogleAnalyticsService
{
    protected string $propertyId;
    protected BetaAnalyticsDataClient $client;

    public function __construct()
    {
        $this->propertyId = 'properties/' . config('services.ga.property_id');

        $this->client = new BetaAnalyticsDataClient([
            'credentials' => storage_path('app/ga/service-account.json'),
            'transport'   => 'rest', // izbegava gRPC ekstenziju
        ]);
    }

    public function summaryLast30Days(): array
    {
        $response = $this->client->runReport([
            'property'    => $this->propertyId,
            'dateRanges'  => [
                new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today']),
            ],
            'metrics'     => [
                new Metric(['name' => 'activeUsers']),
                new Metric(['name' => 'newUsers']),
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'eventCount']),
            ],
        ]);

        $totals = [];
        foreach ($response->getRows() as $row) {
            foreach ($row->getMetricValues() as $i => $metricValue) {
                $key = ['activeUsers','newUsers','sessions','eventCount'][$i] ?? "m{$i}";
                $totals[$key] = (int) $metricValue->getValue();
            }
        }

        return $totals;
    }

    public function dailyUsersLast30Days(): array
    {
        $response = $this->client->runReport([
            'property'    => $this->propertyId,
            'dateRanges'  => [
                new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today']),
            ],
            'dimensions'  => [
                new Dimension(['name' => 'date']),
            ],
            'metrics'     => [
                new Metric(['name' => 'activeUsers']),
            ],
        ]);

        $rows = [];
        foreach ($response->getRows() as $row) {
            $rows[] = [
                'date'        => $row->getDimensionValues()[0]->getValue(),
                'activeUsers' => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $rows;
    }

    public function topPagesLast30Days(int $limit = 10): array
    {
        $response = $this->client->runReport([
            'property'    => $this->propertyId,
            'dateRanges'  => [
                new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today']),
            ],
            'dimensions'  => [
                new Dimension(['name' => 'pagePath']),
            ],
            'metrics'     => [
                new Metric(['name' => 'screenPageViews']),
            ],
            'limit'       => $limit,
            'orderBys'    => [
                new OrderBy([
                    'metric' => new MetricOrderBy(['metric_name' => 'screenPageViews']),
                    'desc'   => true,
                ]),
            ],
        ]);

        $rows = [];
        foreach ($response->getRows() as $row) {
            $rows[] = [
                'pagePath' => $row->getDimensionValues()[0]->getValue(),
                'views'    => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $rows;
    }

    public function realtimeActiveUsers(): int
    {
        $res = $this->client->runRealtimeReport([
            'property' => $this->propertyId,
            'metrics'  => [
                new Metric(['name' => 'activeUsers']),
            ],
        ]);

        if ($res->getRows()->count() === 0) {
            return 0;
        }
        return (int) ($res->getRows()[0]->getMetricValues()[0]->getValue() ?? 0);
    }
}
