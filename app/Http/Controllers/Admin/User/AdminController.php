<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('admin.users.admins.index');
    }

    public function list()
    {
        return $this->adminService->allWithDatatables();
    }

    public function create()
    {
        return view('admin.users.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $attributes = $request->only([
            'name', 'avatar', 'email', 'password', 'phone', 'address', 'birthday', 'gender', 'status'
        ]);
        $user = $this->adminService->create($attributes);
        return redirect()->route('admin.users.admins.edit', $user->id)->with('success', 'User created.');
    }

    public function show($id)
    {
        $user = $this->adminService->findOrFail($id);
        return view('admin.users.admins.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->adminService->findOrFail($id);
        return view('admin.users.admins.edit', compact('user'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $attributes = $request->only([
            'name', 'avatar', 'password', 'phone', 'address', 'birthday', 'gender', 'status'
        ]);
        $user = $this->adminService->update($attributes, $id);
        return redirect()->route('admin.users.admins.edit', $user->id)->with('success', 'User updated.');
    }

    public function destroy($id)
    {
        $this->adminService->destroy($id);
        return response()->json([], 204);
    }

    public function destroyMany(Request $request)
    {
        if ($this->adminService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }
}
