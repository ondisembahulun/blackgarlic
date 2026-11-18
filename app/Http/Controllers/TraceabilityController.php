<?php

namespace App\Http\Controllers;

use App\Models\TraceabilityBatch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TraceabilityController extends Controller
{
    public function index(Request $request): View
    {
        $code = trim((string) $request->query('kode', ''));
        $batch = null;
        $searched = false;

        if ($code !== '') {
            $searched = true;
            $batch = TraceabilityBatch::where('batch_code', $code)->first();
        }

        $sampleBatches = TraceabilityBatch::all();

        return view('pages.traceability', compact('batch', 'code', 'searched', 'sampleBatches'));
    }

    public function checkApi(Request $request): JsonResponse
    {
        $code = trim((string) $request->input('kode', ''));
        if (! $code) {
            return response()->json(['success' => false, 'message' => __('Kode batch tidak boleh kosong.')], 400);
        }

        $batch = TraceabilityBatch::where('batch_code', $code)->first();

        if (! $batch) {
            return response()->json(['success' => false, 'message' => __('Kode batch tidak ditemukan di sistem ketertelusuran.')], 404);
        }

        return response()->json(['success' => true, 'batch' => $batch]);
    }
}
