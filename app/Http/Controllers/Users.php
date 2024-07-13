<?php

namespace App\Http\Controllers;

use App\Models\Users as ModelsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    public function __construct() {

    }

    public function index() {
        $abc = ModelsUsers::all();
        return view('test', [
            'abc' => $abc
        ]);
    }
}
