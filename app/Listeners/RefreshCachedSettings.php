<?php

namespace App\Listeners;

use App\Events\SettingsChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

use App\Models\Settings;

class RefreshCachedSettings
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SettingsChanged  $event
     * @return void
     */
    public function handle(SettingsChanged $event)
    {
        foreach (Settings::all() as $setting){
            Cache::put('settings_' . $setting->setting, $setting->value,  Carbon::now()->addMonth(12));
        };
    }
}
