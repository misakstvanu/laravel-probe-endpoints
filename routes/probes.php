<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

Route::prefix(config('probes.prefix'))->group(function() {
    Route::get('/probe/live', function () {
        return response()->json(['status' => 'ok']);
    });

    Route::get('/probe/ready', function () {
        DB::connection()->getPdo()->query('SELECT 1');;
        Cache::put('readiness_test', 1, 1);

        return response()->json(['status' => 'ok']);
    });
});
