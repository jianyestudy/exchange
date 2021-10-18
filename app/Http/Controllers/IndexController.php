<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    /**
     * 首页统计
     * @param Request $request
     * @Another Edward Yu 2021/10/18上午9:01
     * @return Application|Factory|View
     */
    public function dashboard(Request $request)
    {
        $builder = Card::query();

        if (!$request->user()->admin) {
            $builder->where('user_id', $request->user()->id);
        }

        $card = $builder->with('user')
            ->selectRaw('sum(if(is_use,1,0)) as used, sum(if(id > 0,1,0)) as sum')
            ->first();


        $cardSum = User::query();

        if (!$request->user()->admin) {
            $cardSum->where('id', $request->user()->id);
        }
        $cardSumData = $cardSum->sum('limit');
        $used  = Card::query()
            ->where('is_use', 1);

        if (!$request->user()->admin) {
            $used->where('user_id', $request->user()->id);
        }
        $usedData = $used->with('user')->orderByDesc('use_time')->get();

        $month = Card::query();

        if (!$request->user()->admin) {
            $month->where('user_id', $request->user()->id);
        }

        $monthData = $month->selectRaw("DATE_FORMAT(use_time,'%Y%m') as months, count(*) as used")
            ->where('is_use', 1)
            ->groupByRaw('months')->get();
        $data['months'] = $monthData->pluck('months');
        $data['used'] = $monthData->pluck('used');


        return view('dashboard')
            ->with('card', $card)
            ->with('cardSum', $cardSumData)
            ->with('usedData', $usedData)
            ->with('data', $data);
    }
}
