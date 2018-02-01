<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $settings = Setting::first();

        return view('admin.settings.settings')->with('settings', $settings);
    }

    public function update(){
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
            'about_site' => 'required',
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;
        $settings->about_site = request()->about_site;

        $settings->save();

        Session::flash('success', 'Settings updated.');

        return redirect()->back();
    }
}
