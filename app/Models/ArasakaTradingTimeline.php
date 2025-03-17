<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArasakaTradingTimeline extends Model
{
    //
    protected $table = 'arasaka_trading_timeline';
    protected $fillable = [
        'model_name',
        // Features
        'features',
        // Performance Metrics
        'train_mse', 'test_mse', 'train_rmse', 'test_rmse', 'train_mae',
        'test_mae', 'train_r2', 'test_r2', 'train_explained_variance', 'test_explained_variance',
        // Scaling Parameters
        'scaling_mean', 'scaling_std_dev',
        // Environment
        'model_env'
    ];
    
    protected $casts = [
        'scaling_mean' => 'array', // Laravel will automatically decode JSON
        'scaling_std_dev' => 'array',
        'features' => 'array',
    ];
}
