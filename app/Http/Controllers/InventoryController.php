<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Inertia\Inertia;

// Request Validation
use App\Http\Requests\Inventory\Store;
use App\Http\Requests\Inventory\Update;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::with('User')->orderBy('created_at', 'desc')->paginate(10);

        return Inertia::render('Inventory/Index', [
            'inventories' => $inventories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Inventory/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        Inventory::create($request->all());

        return redirect(route('inventory.index'))->with([
            'message' => 'New Inventory was inserted',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return Inertia::render('Inventory/Edit', [
            'inventory' => $inventory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Inventory $inventory)
    {
        $inventory->update($request->all());

        return redirect(route('inventory.index'))->with([
            'message' => "{$inventory->name} was updated successfully",
            'type' => 'warning',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect(route('inventory.index'))->with([
            'message' => "{$inventory->name} was deleted",
            'type' => 'danger',
        ]);
    }
}
