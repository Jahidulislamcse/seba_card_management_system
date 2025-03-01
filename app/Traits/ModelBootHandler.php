<?php

namespace App\Traits;

use App\Services\FileUploadService;
use App\Models\ProductVariant;
use App\Models\Product;

trait ModelBootHandler
{

    public static function booted()
    {
        parent::boot();

        static::creating(function($model){
            $model->created_by = auth()->id() ?? null;
        });

        static::updating(function($model){
            $model->updated_by = auth()->id() ?? null;
        });

        // static::deleting(function($model){
            
        // });
    }
}
