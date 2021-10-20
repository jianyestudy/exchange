<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class CardController extends Controller
{
    protected $user;
    protected $card;
    public function __construct(User $user, Card $card)
    {
        $this->user = $user;
        $this->card = $card;
    }


    /**
     * 兑换卡号
     * @param Request $request
     * @Another Edward Yu 2021/10/18下午10:15
     * @return RedirectResponse
     */
    public function exchange(Request $request)
    {
        $requestData = $request->toArray();

        if (empty($requestData['card_number'])) {
            return back()->withErrors('卡号输入错误！');
        }

        if (empty($requestData['card_password'])) {
            return back()->withErrors('密码输入错误！');
        }

        if (empty($requestData['phone'])) {
            return back()->withErrors('手机号码输入错误！');
        }

        $result = Card::query()
            ->where('card_number', $requestData['card_number'])
            ->where('card_password', $requestData['card_password'])
            ->where('is_use', 0)
            ->whereNull('deleted_at')
            ->first();

        if (empty($result)) {
            return back()->withErrors('未找到相应卡号信息！');
        }

       $result->is_use = 1;
       $result->use_time = Carbon::now()->toDateTimeString();
       $result->phone = $requestData['phone'];
       $result->save();

        return  back()->with('success', '兑换成功！,正在为您自动跳转...');
    }
    /**
     * 删除卡号
     * @param Request $request
     * @param int $id
     * @Another Edward Yu 2021/10/18上午8:57
     * @return RedirectResponse
     */
    public function deleteCard(Request $request, int $id): RedirectResponse
    {
        $builder = Card::query();

        if ($request->user()->admin === 0) {
            $builder->where('user_id', $request->user()->id);
        }

        $builder->where('id', $id)->delete();

        return back()->with('success', '删除成功');
    }

    /**
     * 卡号展示
     * @param Request $request
     * @param int $type
     * @Another Edward Yu 2021/10/18上午8:57
     * @return Application|Factory|View
     */
    public function used(Request $request ,int $type = 0)
    {
        $requestData = $request->toArray();
        $builder = Card::query();

        if ($type === 1) {
            $view = 'unused';
            $builder->where('is_use', 0);
        }else {
            $view = 'used';
            $builder->where('is_use',1)
                    ->orderByDesc('use_time');
        }

        if ($request->user()->admin === 0) {
            $builder->where('user_id', $request->user()->id);
        }

        if (!empty($requestData['card_number'])) {
            $builder->where('card_number', $requestData['card_number']);
        }

        if (!empty($requestData['phone'])) {
            $builder->where('phone', $requestData['phone']);
        }

        if (!empty($requestData['nickname'])) {
            $builder->with('user', function ($query) use ($requestData){
                $nickname = $requestData["nickname"];
                $query->where('nickname', 'like',"%$nickname%");
            });
        }

        if (!empty($requestData['date'])) {
            $dateArray = explode('-', $requestData['date']);
            $builder->whereBetween('use_time', $dateArray);
        }

        $data = $builder->with('user')
            ->whereNull('deleted_at')
            ->paginate(10);


        return view($view)->with('result', $data);
    }

    /**
     * 新增
     * @param Request $request
     * @Another Edward Yu 2021/10/18上午8:57
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        $created = $this->user::query()
            ->where('id', $request->user()->id)
            ->withCount(['card as created'])
            ->first();

        $remain = $request->user()->limit - $created->created;

        return view('create')->with('remain', $remain)->with('created', $created->created);
    }

    /**
     * 新增卡号
     * @param Request $request
     * @Another Edward Yu 2021/10/18上午8:58
     * @return RedirectResponse
     */
    public function createCard(Request $request): RedirectResponse
    {
         $number = $request->number;

         $limit = $request->user()->limit;

         $used = $this->user::query()
             ->where('id', $request->user()->id)
             ->withCount(['card as used'])
             ->first();

         if (($limit-$used->used) < $number ) {
             return back()->withErrors('数量超出！');
         }

        $max = Card::query()
            ->max('card_number');

         if (empty($max)) {
             $max = 100001;
         }
         for ($i = 1; $i <= $number; $i++){
             $data[] = [
                 'user_id'      =>  $request->user()->id,
                 'card_number'  =>  $max++,
                 'card_password' =>  \Faker\Provider\Uuid::randomNumber(6),
                 'created_at' => Carbon::now()->toDateTime(),
                 'updated_at' => Carbon::now()->toDateTime()
             ];
         }

         $result = Card::query()->insert($data);

         if (empty($result)) {
             return back()->withErrors('生成失败！');
         }

         return  back()->with('success', '生成成功！');
    }
}
