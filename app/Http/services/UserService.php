<?php

namespace App\Http\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function login($request): ?User
    {
        $user = $this->user->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return null;
        }
        return $user;
    }


    public function register($request)
    {
        $userCreate = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'namsinh' => $request->namsinh,
            'sdt' => $request->sdt,
            'role' => $request->role,
            'gender' => $request->gender

        ]);
        return $userCreate;
    }
    public function create($request)
    {
        $userCreate = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'namsinh' => $request->namsinh,
            'sdt' => $request->sdt,
            'gender' => $request->gender,
            'role' => $request->role
        ]);
        return $userCreate;
    }

    public function update($request, $id)
    {
        $user = $this->find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'namsinh' => $request->namsinh,
            'sdt' => $request->sdt,
            'gender' => $request->gender,
            'role' => $request->role,
        ]);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->find($id);

        if ($user) {
            // Xóa menu
            $user->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa user thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy user.');
        }
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function getByEmail($email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function paginate($int)
    {
        return $this->user->paginate($int);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function getPermissions($id)
    {
        $user = $this->user->find($id);
        $roles = $user->roles;
        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission->value;
            }
        }
    return $permissions;
    }





}
