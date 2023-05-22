<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Profile;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //
    public function index(){
        $data = Profile::all();
        return response()->json($data);
    }
}
