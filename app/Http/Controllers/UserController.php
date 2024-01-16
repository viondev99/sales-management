<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $sort = $request->input('sort', 'created_at,desc');

        list($sortField, $sortDirection) = explode(',', $sort);

        $users = User::orderBy($sortField, $sortDirection)->paginate($size, ['*'], 'page', $page);

        return response()->json([
            'data' => $users->items(),
            'page' => $users->currentPage(),
            'size' => $users->perPage(),
            'total_page' => $users->lastPage(),
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
        $user = new User(); // Khởi tạo đối tượng mới

        $this->validate($request, [
            'user_name' => 'required|unique:users',
            'password' => 'required',
            'email' => 'required|unique:users',
        ]);

        $userData = $user->create([
            'user_name' => $request->input('user_name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),

        ]);

        return response()->json($userData, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::where('user_id', $id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
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
        $data = $request->except(['_token', '_method']);
        $userData = User::where('user_id', $id);
        $status = false;
        if ($userData) {
            $status = $userData->update($data);
        }
        return response()->json([$data, 'status' => $status], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = new User();
        $userData = $user->find($id);

        if (!$userData) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $userData->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }
}
