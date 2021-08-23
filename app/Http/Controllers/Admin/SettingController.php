<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $page_name = "System Setting";
        $setting = Setting::findOrFail(1);

        $setting_name = $setting->value;

        return view("admin.setting.update", compact('page_name', 'setting_name'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $favicon_setting = Setting::findOrFail(2);
        if ($request->file('favicon')) {
            $old_file = public_path('/upload/others/') . $favicon_setting->value;

            if (file_exists($old_file)) {
                unlink(public_path('/upload/others/') . $favicon_setting->value);
            }
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $favicon = 'favicon' . '.' . $extension;
            $file->move(public_path('/upload/others'), $favicon);
            $favicon_setting->value = $favicon;
            $favicon_setting->save();
        }

        $front_logo_setting = Setting::findOrFail(3);
        if ($request->file('front_logo')) {
            $old_file = public_path('/upload/others/') . $front_logo_setting->value;
            if (file_exists($old_file)) {
                unlink(public_path('/upload/others/') . $front_logo_setting->value);
            }
            $file = $request->file('front_logo');
            $extension = $file->getClientOriginalExtension();
            $front_logo = 'front_logo' . '.' . $extension;
            $file->move(public_path('/upload/others'), $front_logo);
            $front_logo_setting->value = $front_logo;
            $front_logo_setting->save();
        }

        $admin_logo_setting = Setting::findOrFail(4);
        if ($request->file('admin_logo')) {
            $old_file = public_path('/upload/others/') . $admin_logo_setting->value;
            if (file_exists($old_file)) {
                unlink(public_path('/upload/others/') . $admin_logo_setting->value);
            }

            $file = $request->file('admin_logo');
            $extension = $file->getClientOriginalExtension();
            $admin_logo = 'admin_logo' . '.' . $extension;
            $file->move(public_path('/upload/others'), $admin_logo);
            $admin_logo_setting->value = $admin_logo;
            $admin_logo_setting->save();
        }

        $system_setting = Setting::findOrFail(1);
        $system_setting->value = $request->name;
        $system_setting->save();

        return back()->with('success', 'Setting Updated Successfully');
    }
}
