<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Settings::find(1);
        return view('settings.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $settings)
    {
        $settings = Settings::find(1);
        $settings->appName = $request->appName;
        $settings->shortDescription = $request->shortDescription;
        $settings->appVersion = $request->appVersion;
        $settings->fcmKey = $request->fcmKey;
        $settings->aboutUs = $request->aboutUs;

        if ($request->hasFile('appLogo')) {
            if ($settings->appLogo != null) {
                $oldImagePath = public_path("/uploads/$settings->appLogo");
                unlink($oldImagePath);
            }
            $appLogo = $request->file('appLogo');
            $extension = $appLogo->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $appLogo->move('uploads/', $filename);
            $settings->appLogo = $filename;
        }

        $settings->save();

        return redirect()->route('settings.index')->withStatus(__('Settings was updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
