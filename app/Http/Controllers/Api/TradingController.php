<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArasakaTradingTimeline;
use Illuminate\Http\Request;

class TradingController extends Controller
{
    public function index()
    {
        return response()->json(ArasakaTradingTimeline::paginate(10));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'model_name' => 'required|string',
            // 'model_env' => 'required|string',
            'model_env' => 'nullable|string', // 🤖 This is temporary. There are currently two versions. The current Production version doesn't include the environment.
            'features' => 'required|array',
            'scaling_mean' => 'nullable|array',
            'scaling_std_dev' => 'nullable|array',
            'train_mse' => 'required|numeric',
            'test_mse' => 'required|numeric',
            'train_rmse' => 'required|numeric',
            'test_rmse' => 'required|numeric',
            'train_mae' => 'required|numeric',
            'test_mae' => 'required|numeric',
            'train_r2' => 'required|numeric',
            'test_r2' => 'required|numeric',
            'train_explained_variance' => 'required|numeric',
            'test_explained_variance' => 'required|numeric',
        ]);

        $data['features'] = json_encode($data['features']);
        $data['scaling_mean'] = json_encode($data['scaling_mean']);
        $data['scaling_std_dev'] = json_encode($data['scaling_std_dev']);

        $record = ArasakaTradingTimeline::create($data);

        return response()->json($record, 201);
    }

    public function show($id)
    {
        $record = ArasakaTradingTimeline::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        return response()->json($record);
    }

    public function update(Request $request, $id)
    {
        $record = ArasakaTradingTimeline::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $data = $request->all();
        if (isset($data['features'])) $data['features'] = json_encode($data['features']);
        if (isset($data['scaling_mean'])) $data['scaling_mean'] = json_encode($data['scaling_mean']);
        if (isset($data['scaling_std_dev'])) $data['scaling_std_dev'] = json_encode($data['scaling_std_dev']);

        $record->update($data);

        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = ArasakaTradingTimeline::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
