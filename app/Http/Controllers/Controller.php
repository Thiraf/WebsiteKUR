<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Activity;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponseObj($data)
    {
        return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $data
        ]);
    }

    public function errorResponseObj($msg,$data)
    {
        return response()->json([
            'error' => true,
            'message' => $msg,
            'data' => $data
        ], 400);
    }

    public function successResponseMsg($msg)
    {
        return response()->json([
            'error' => false,
            'message' => $msg,
        ]);
    }

    public function errorResponseMsg($msg)
    {
        return response()->json([
            'error' => true,
            'message' => $msg,
        ]);
    }

    public function errNotFoundMsg()
    {
        return response()->json([
            'error' => true,
            'message' => "Data tidak ditemukan",
        ]);
    }

    /**
     * Create activity for kur request
     *
     * @param Array $data
     * @return Activity
     */
    public function addActivity($data)
    {
        $activity = Activity::create([
            'ref_id' => $data['ref_id'],
            'user_id' => $data['user_id'],
            'type' => $data['type'],
            'remark' => $data['remark']
        ]);

        return $activity;
    }
}
