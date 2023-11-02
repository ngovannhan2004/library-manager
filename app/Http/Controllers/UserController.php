<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        return view('admin.pages.user.index', compact('users'));
    }

    public function create()
    {
        $users = $this->userService->getAll();
        return view('admin.pages.user.create', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {

        $this->userService->create($request);
        return redirect()->route('admin.users.index')->with('success', 'Thêm user thành công');

    }

    public function edit($id)
    {
       $user = $this->userService->find($id);
        return view('admin.pages.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->update($request, $id);
        return redirect()->route('admin.users.index')->with('success', 'Cập nhật user thành công');

    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->route('admin.users.index')->with('success', 'Xóa user thành công');
    }

}
