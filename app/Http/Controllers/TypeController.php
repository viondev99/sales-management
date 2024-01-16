<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $sort = $request->input('sort', 'created_at,ASC');

        list($sortField, $sortDirection) = explode(',', $sort);

        $types = Type::orderBy($sortField, $sortDirection)->paginate($size, ['*'], 'page', $page);

        return response()->json([
            'data' => $types->items(),
            'page' => $types->currentPage(),
            'size' => $types->perPage(),
            'total_page' => $types->lastPage(),
        ]);
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
    public function store(Request $request)
    {
        //
        $validator = $this->validate($request, [
            'type_code' => 'required|unique:types,type_code',
            'type_name' => 'required|unique:types,type_name',
        ], [
            'type_code.unique' => 'Type Code đã tồn tại',
            'type_name.unique' => 'Type name đã tồn tại',
        ]);

        $type = new Type([
            'type_code' => $request->input('type_code'),
            'type_name' => $request->input('type_name'),
        ]);
        $type->save();

        return response()->json([
            'data' => $type,
            'message' => 'Type created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
