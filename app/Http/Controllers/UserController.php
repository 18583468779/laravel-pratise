<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    private function getUser(string $name)
    {
        // 获取当前用户
        $user = User::where('name', $name);
        foreach (['email', 'mobile'] as $filed) {
            $user->orWhere($filed, $name);
        }
        return $user->first();
    }
    public function login(Request $request) // 用户登录
    {
        $user = $this->getUser($request->input('name'));
        $request->validate([
            'name' => [
                'required',
                function ($attr, $value, $fail) use ($user) {
                    if (!$user) {
                        $fail('用户不存在,请检查账号');
                    }
                }
            ],
            'password' => [
                'required',
                function ($attr, $value, $fail) use ($user, $request) {
                    if (!Hash::check($request->input('password'), $user->password)) {
                        $fail('密码错误，请重新输入密码');
                    }
                }
            ]
        ]);
        Auth::login($user);
        return ['code' => 0, 'msg' => '恭喜你，登录成功', 'data' => $user];
    }
    public function register() {}
    public function logout() {}
}
