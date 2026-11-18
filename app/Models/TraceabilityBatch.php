<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraceabilityBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_code',
        'product_name',
        'farm_origin',
        'elevation',
        'farmer_name',
        'harvest_date',
        'raw_material_grade',
        'fermentation_start_date',
        'fermentation_end_date',
        'fermentation_duration_days',
        'fermentation_chamber',
        'extraction_method',
        'packaging_date',
        'expiry_date',
        'moisture_content',
        'sac_polyphenol_level',
        'quality_test_status',
        'lab_test_cert_number',
        'status',
        'notes',
    ];

    protected $casts = [
        'harvest_date' => 'date',
        'fermentation_start_date' => 'date',
        'fermentation_end_date' => 'date',
        'packaging_date' => 'date',
        'expiry_date' => 'date',
        'fermentation_duration_days' => 'integer',
    ];
}
