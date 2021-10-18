<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * 用户列表
     * @param Request $request
     * @Another Edward Yu 2021/10/17下午10:35
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if (!$request->user()->admin) {
            return false;
        }
        $result = User::query()
        ->withCount(['card as used' => function ($q) {
            $q->where('is_use', 1);
        }])
            ->withCount(['card as sum'])
            ->paginate(10);

        return \view('manager')->with('result', $result);
    }


    /**
     * 更新或者新增用户
     * @param Request $request
     * @Another Edward Yu 2021/10/17下午10:35
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;
        $requestData = $request->only(['username', 'password', 'nickname', 'limit']);


        if ($requestData['password']) {
            $requestData['password'] = Hash::make($requestData['password']);
        }else {
            unset($requestData['password']);
        }

        if (!empty($id)) {
            $result = User::query()->where('id', $id)->update($requestData);
        }else{
            $result = User::query()->create($requestData);
        }

        if (!$result) {
            return back()->withErrors('执行失败');
        }

        return  back()->with('success', '执行成功');
    }


    /**
     * 删除用户
     * @param int $id
     * @Another Edward Yu 2021/10/17下午10:35
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $result = User::destroy($id);

        if (empty($result)) {
            return back()->withErrors('执行失败');
        }

        return  back()->with('success', '执行成功');
    }

    /**
     * 登录页
     * @param Request $request
     * @Another Edward Yu 2021/10/17下午7:16
     * @return Application|Factory|View
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return view('auth.login');
    }


    /**
     * 验证用户
     * @param Request $request
     * @Another Edward Yu 2021/10/17下午7:17
     * @return Application|Factory|View|RedirectResponse
     */
    public function auth(Request $request)
    {
        $auth = $request->only(['username', 'password']);
        if (Auth::attempt($auth, (bool) $request->remember)) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }

        return back()->withErrors("登录失败，请检查账号密码是否正确！");
    }

    /**
     * 登出
     * @Another Edward Yu 2021/10/17下午7:17
     * @return Application|Factory|View
     */
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
