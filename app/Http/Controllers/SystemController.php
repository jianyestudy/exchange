<?php

namespace App\Http\Controllers;

use App\Models\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class SystemController extends Controller
{
    public function index(Request $request)
    {

        $result = system::all();

        return view('system')->with(['result' => $result]);
    }

    public function update(Request $request)
    {
        $requestData = $request->toArray();
        $logo = $request->file('logo');

        Validator::make($request->all(),
            ['logo' => 'mimes:jpeg,png,gif', 'max' => '1024'],
            ['mimes' => "logo格式不允许", 'max'=> 'logo大小超出限制'])->validate();

        if (!empty($requestData['logo'])) {

            $save = $logo->storeAs('images', 'logo.' . $logo->getClientOriginalExtension());
            if (!$save) {
                return back()->withErrors('logo保存失败');
            }
            $requestData = $request->toArray();
            $requestData['logo'] = 'images/logo.' . $logo->getClientOriginalExtension();
        }else{
            unset($requestData['logo']);
        }

        $result = 0;
        foreach ($requestData as $key => $value) {
            $result += system::query()
                ->where('key', $key)
                ->update(['value' => $value]);
        }

        if ($result !== count($requestData)) {
            return back()->withErrors('保存失败');
        }

        return back()->with('success', '保存成功');
    }
}
