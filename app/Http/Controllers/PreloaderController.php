<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class PreloaderController extends Controller
{

     /**VERSION 3.2 */

    // preloader settings

    function preloaderSettings()
    {
        return view('backend.common.setting.preloader.index');
    }

    function preloaderUpdate(Request $request)
    {

        if ($request->hasFile('preloader_icon')) {
            $path = fileUpload($request->preloader_icon, 'preloader');
            overWriteEnvFile('PRELOADER_ICON', $path);
        }

        overWriteEnvFile('PRELOADER_ACTIVE_CLASS', $request->preloader_active_class);

        overWriteEnvFile('PRELOADER_ICON_WITDH', $request->preloader_icon_witdh);

        overWriteEnvFile('PRELOADER_BG', $request->preloader_bg);

        return back();
    }

    /**VERSION 3.2::END */

    //END
}
