<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ArmazenagemRepositoryInterface 
{
    public function search(Request $request);
}
