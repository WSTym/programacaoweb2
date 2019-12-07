<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return [
            'id' => 1,
            'name' => "Mr. Smith",
            'email' => "mrsmith@aol.com"
        ];
    }
}
