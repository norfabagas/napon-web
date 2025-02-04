<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function termAndCondition()
    {
        return view('admin.setting.term_and_condition')
            ->with([
                'data' => Setting::where('key', 'term_and_condition')->first()
            ]);
    }

    public function termAndConditionUpdate(Request $request)
    {
        $validator = Validator::make($request->only([
            'term_and_condition'
        ]), [
            'term_and_condition' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Setting::where('key', 'term_and_condition')->first();
        $data->value = $request->term_and_condition;
        $data->save();

        return redirect()->route('admin.term_and_condition')
            ->with('status', __('Term And Condition diperbarui'));
    }

    public function contact()
    {
        return view('admin.setting.contact')
            ->with([
                'address' => Setting::where('key', 'contact_address')->first(),
                'email' => Setting::where('key', 'contact_email')->first(),
                'phone' => Setting::where('key', 'contact_phone')->first(),
                'website' => Setting::where('key', 'contact_website')->first(),
            ]);
    }

    public function contactUpdate(Request $request)
    {
        $validator = Validator::make($request->only([
            'address',
            'email',
            'phone',
            'website'
        ]), [
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $address = Setting::where('key', 'contact_address')->first();
        $address->value = $request->address;
        $address->save();

        $email = Setting::where('key', 'contact_email')->first();
        $email->value = $request->email;
        $email->save();

        $phone = Setting::where('key', 'contact_phone')->first();
        $phone->value = $request->phone;
        $phone->save();

        $website = Setting::where('key', 'contact_website')->first();
        $website->value = $request->website;
        $website->save();

        return redirect()
            ->route('admin.contact')
            ->with('status', 'Contact updated');
    }
}
