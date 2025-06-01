<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\StoreRequest;
use App\Http\Requests\Type\UpdateRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return TypeResource::collection($types);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $type = Type::create($data);
        return TypeResource::make($type);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return TypeResource::make($type);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);
        //$type = $type->fresh();
        return TypeResource::make($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return response()->json(['message' => 'done', 'status' => 200]);
    }
}
