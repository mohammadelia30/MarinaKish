<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Offcode;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class OffcodeController extends Controller
{
    public function store( Request $request)
    {
        $off_code = new Offcode();
        $off_code = $off_code->Create($request->toArray());
        return response()->json(['message'=>'کد تخفیف با موفقیت ثبت شد','off code' => $off_code]);
    }
    public function use($code_id,$factore_id)
    {
        $factor = new Factor();
        $off_code = new Offcode();
        $off_code = $off_code->findOrFail($code_id);
        $number = $off_code->number;
        $expire = $off_code->expire_time;
        $today = Carbon::now();
        if(($number > 0)and($today->lessThan($expire)))
        {
            $factor = $factor->find($factore_id);
            $price = $factor->total_price;
            $pricen_nagative = ($price * $off_code->percent)/100;
            $new_price = $price - $pricen_nagative;
            $factor->update([
                'total_price'=>$new_price
            ]);
            $number = $number - 1;
            Offcode::find($code_id)->update([
                'number'=>$number
            ]);
            return response()->json($factor);
        }else{
            return response()->json('کد تخفیف معتبر نمی باشد');
        }
    }
}
