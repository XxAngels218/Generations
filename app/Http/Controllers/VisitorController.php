<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitorRequest;
use App\Http\Resources\VisitorResource;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function store(StoreVisitorRequest $request)
    {
        return new VisitorResource(Visitor::create($request->all()));
    }

    public function index()
    {
        // consult the visitors
        return response()->json(Visitor::all(), 200);
    }
}
