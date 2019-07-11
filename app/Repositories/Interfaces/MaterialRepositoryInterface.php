<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface MaterialRepositoryInterface 
{
    public function search(Request $request);
}
