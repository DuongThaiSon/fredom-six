<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMemberRequest;
use App\Http\Requests\Admin\UpdateMemberRequest;
use App\Services\Admin\MemberService;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function index()
    {
        return view('admin.users.members.index');
    }

    public function list()
    {
        return $this->memberService->allWithDatatables();
    }

    public function create()
    {
        return view('admin.users.members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $attributes = $request->only([
            'name', 'avatar', 'email', 'password', 'phone', 'address', 'birthday', 'gender', 'status'
        ]);
        $user = $this->memberService->create($attributes);
        return redirect()->route('admin.users.members.edit', $user->id)->with('success', 'User created.');
    }

    public function show($id)
    {
        $user = $this->memberService->findOrFail($id);
        return view('admin.users.members.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->memberService->findOrFail($id);
        return view('admin.users.members.edit', compact('user'));
    }

    public function update(UpdateMemberRequest $request, $id)
    {
        $attributes = $request->only([
            'name', 'avatar', 'password', 'phone', 'address', 'birthday', 'gender', 'status'
        ]);
        $user = $this->memberService->update($attributes, $id);
        return redirect()->route('admin.users.members.edit', $user->id)->with('success', 'User updated.');
    }

    public function destroy($id)
    {
        $this->memberService->destroy($id);
        return response()->json([], 204);
    }

    public function destroyMany(Request $request)
    {
        if ($this->memberService->destroyMany($request->ids)) {
            return response()->json([], 204);
        }

        return response()->json([
            'message' => "failed_to_delete"
        ], 400);
    }
}
