<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Setting;
class SettingController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth');
        $this->middleware('permission:create-setting|edit-setting|setting-setting', ['only' => ['index','show']]);
        $this->middleware('permission:create-setting', ['only' => ['create','store']]);
        $this->middleware('permission:edit-setting', ['only' => ['edit','update']]);
    }

    public function index()
    {
        return view('setting.edit',[
            'setting'=>Setting::get()->first(),
            'levels'=>Level::all()
        ]);
    }

    public function update(Request $request,Setting $setting)
    {
       // dd($request->all());
        $setting->update([
            'sales_approve'=>$request['sales_approve'],
            'person_delegate'=>$request['person_delegate'],
            'pm_approve'=>$request['pm_approve'],
            'cs'=>$request['cs'],
            'pl'=>$request['pl'],
            'auto_email_ss'=>$request['auto_email_ss']=="on"?1:0,
            'auto_email_pm'=>$request['auto_email_pm']=="on"?1:0
        ]);
        return redirect()->route('setting.index')
                    ->withSuccess('Setting is updated successfully.');
    }
}
