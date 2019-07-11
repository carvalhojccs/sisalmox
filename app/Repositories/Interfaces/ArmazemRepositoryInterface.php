<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ArmazemRepositoryInterface 
{
    public function search(Request $request);
}
