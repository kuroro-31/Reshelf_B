<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        return new UserResource($request->user());
    }
}
