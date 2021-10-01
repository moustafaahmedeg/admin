<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller {
    public function json($data, $message, $status) {
        return response()->json([
            'data' => $data,
            'status' => $message,
        ], $status);
    }

    public function jsonSuccess($data) {
        return $this->json($data, 'success', 200);
    }

    public function jsonError($status) {
        return $this->json([], 'failed', $status);
    }
}
