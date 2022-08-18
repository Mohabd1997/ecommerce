<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingRequest;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethods($type)
    {
        if($type === 'free')
        {
            $shipping_method = Setting::where('key','free_shipping_label')->first();
        }
        elseif($type === 'inner')
        {
            $shipping_method = Setting::where('key','local_label')->first();
        }
        elseif($type == 'outer')
        {
            $shipping_method = Setting::where('key','outer_label')->first();
        }
        else
        {
            return 'Shipping Method not found!';
        }
        return view('admin.settings.shippings.edit',compact('shipping_method'));

    }
    public function updateShippingMethods(ShippingRequest $request, $id)
    {
        try
        {
        DB::beginTransaction();
        $shipping_method = Setting::find($id);
        $shipping_method -> update(['plain_value'=> $request->plain_value]);
        $shipping_method -> value = $request -> value;
        $shipping_method->save();
        return redirect()->back()->with(['success'=>'تم تحديث البيانات بنجاح']);
        }catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect()->back()->with(['error'=>'هناك خطأ ما! يرجى المحاولة مرة أخرى']);

        }
    }
}
