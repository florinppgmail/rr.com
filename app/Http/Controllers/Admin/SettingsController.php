<?php

namespace App\Http\Controllers\Admin;

use App\Events\SettingsChanged;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Settings;

class SettingsController extends Controller
{
   public function update(Request $request)
    {
        foreach ($request->all() as $key => $value){
            if(!Settings::where('setting', $key)->update(['value' => $value]))
                Settings::create(['setting' => $key, 'value' => $value]);

        }
        // we trigger cache update
        event(new SettingsChanged());

        return response()->json('Settings updated', 200);
    }
}
