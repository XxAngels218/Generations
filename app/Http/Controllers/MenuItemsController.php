<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use Illuminate\Http\Request;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = MenuItems::all(['name', 'url']);
        return response()->json($menus);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'required|url',
        ]);

        $menu = MenuItems::create([
            'name' => $request->input('name'),
            'url' => $request->input('url'),
        ]);

        return response()->json($menu, 201);

    }
}
