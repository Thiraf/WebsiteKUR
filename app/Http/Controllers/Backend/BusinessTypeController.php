<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessType;

class BusinessTypeController extends Controller
{
    //
    public function index()
    {
        return view('backend.pages.business_type.index');
    }


}
