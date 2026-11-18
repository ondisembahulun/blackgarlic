<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TraceabilityBatch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TraceabilityBatchController extends Controller
{
    /**
     * Display a listing of traceability batches.
     */
    public function index(Request $request): View
    {
        $query = TraceabilityBatch::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('batch_code', 'like', "%{$search}%")
                    ->orWhere('product_name', 'like', "%{$search}%")
                    ->orWhere('farmer_name', 'like', "%{$search}%")
                    ->orWhere('farm_origin', 'like', "%{$search}%");
            });
        }

        $batches = $query->latest('harvest_date')->paginate(10)->withQueryString();

        return view('admin.traceability.index', compact('batches'));
    }

    /**
     * Show the form for creating a new traceability batch.
     */
    public function create(): View
    {
        $products = Product::pluck('name');

        return view('admin.traceability.create', compact('products'));
    }

    /**
     * Store a newly created traceability batch in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'batch_code' => ['required', 'string', 'max:50', 'unique:traceability_batches,batch_code'],
            'product_name' => ['required', 'string', 'max:255'],
            'farm_origin' => ['required', 'string', 'max:255'],
            'elevation' => ['required', 'string', 'max:50'],
            'farmer_name' => ['required', 'string', 'max:150'],
            'harvest_date' => ['required', 'date'],
            'raw_material_grade' => ['required', 'string', 'max:100'],
            'fermentation_start_date' => ['required', 'date'],
            'fermentation_end_date' => ['required', 'date'],
            'fermentation_duration_days' => ['required', 'integer', 'min:1'],
            'fermentation_chamber' => ['required', 'string', 'max:255'],
            'extraction_method' => ['nullable', 'string', 'max:255'],
            'packaging_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date'],
            'moisture_content' => ['required', 'string', 'max:50'],
            'sac_polyphenol_level' => ['required', 'string', 'max:255'],
            'quality_test_status' => ['required', 'string', 'max:255'],
            'lab_test_cert_number' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'in:Verified,In Testing,Archived'],
            'notes' => ['nullable', 'string'],
        ]);

        TraceabilityBatch::create($validated);

        return redirect()->route('admin.traceability.index')
            ->with('success', 'Batch Ketertelusuran "'.$validated['batch_code'].'" berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified traceability batch.
     */
    public function edit(TraceabilityBatch $traceability): View
    {
        $products = Product::pluck('name');

        return view('admin.traceability.edit', [
            'batch' => $traceability,
            'products' => $products,
        ]);
    }

    /**
     * Update the specified traceability batch in storage.
     */
    public function update(Request $request, TraceabilityBatch $traceability): RedirectResponse
    {
        $validated = $request->validate([
            'batch_code' => ['required', 'string', 'max:50', 'unique:traceability_batches,batch_code,'.$traceability->id],
            'product_name' => ['required', 'string', 'max:255'],
            'farm_origin' => ['required', 'string', 'max:255'],
            'elevation' => ['required', 'string', 'max:50'],
            'farmer_name' => ['required', 'string', 'max:150'],
            'harvest_date' => ['required', 'date'],
            'raw_material_grade' => ['required', 'string', 'max:100'],
            'fermentation_start_date' => ['required', 'date'],
            'fermentation_end_date' => ['required', 'date'],
            'fermentation_duration_days' => ['required', 'integer', 'min:1'],
            'fermentation_chamber' => ['required', 'string', 'max:255'],
            'extraction_method' => ['nullable', 'string', 'max:255'],
            'packaging_date' => ['required', 'date'],
            'expiry_date' => ['required', 'date'],
            'moisture_content' => ['required', 'string', 'max:50'],
            'sac_polyphenol_level' => ['required', 'string', 'max:255'],
            'quality_test_status' => ['required', 'string', 'max:255'],
            'lab_test_cert_number' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'in:Verified,In Testing,Archived'],
            'notes' => ['nullable', 'string'],
        ]);

        $traceability->update($validated);

        return redirect()->route('admin.traceability.index')
            ->with('success', 'Batch "'.$traceability->batch_code.'" berhasil diperbarui!');
    }

    /**
     * Remove the specified traceability batch from storage.
     */
    public function destroy(TraceabilityBatch $traceability): RedirectResponse
    {
        $code = $traceability->batch_code;
        $traceability->delete();

        return redirect()->route('admin.traceability.index')
            ->with('success', 'Batch "'.$code.'" berhasil dihapus.');
    }
}
