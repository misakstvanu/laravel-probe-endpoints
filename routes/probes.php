use Illuminate\Support\Facades\Route;

<?php


Route::get('/probe/liveness', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/probe/readiness', function () {
    // Add your readiness checks here
    $isReady = true;

    if ($isReady) {
        return response()->json(['status' => 'ok']);
    } else {
        return response()->json(['status' => 'not ready'], 503);
    }
});