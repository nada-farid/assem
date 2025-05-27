<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Alert;

class SettingController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {

        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        if ($request->setting_type == 'setting_1') {
            Setting::updateOrCreate(['key' => 'site_name'], ['value' => $request->site_name]);
            Setting::updateOrCreate(['key' => 'phone'], ['value' => $request->phone]);
            Setting::updateOrCreate(['key' => 'email'], ['value' => $request->email]);
            Setting::updateOrCreate(['key' => 'address'], ['value' => $request->address]);
            Setting::updateOrCreate(['key' => 'description'], ['value' => $request->description]);
            Setting::updateOrCreate(['key' => 'description_2'], ['value' => $request->description_2]);
            Setting::updateOrCreate(['key' => 'vision_text'], ['value' => $request->vision_text]);
            Setting::updateOrCreate(['key' => 'mission_text'], ['value' => $request->mission_text]);
            Setting::updateOrCreate(['key' => 'values_text'], ['value' => $request->values_text]);

            if ($request->has('logo')) {
                if ($request->input('logo') != "undefined") {
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('logo'))));
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name = time() . '_logo_settings.' . $extension;
                    $file->move('public/settings', $file_name);
                    Setting::updateOrCreate(['key' => 'logo'], ['value' => 'settings/' . $file_name]);
                }
            } else {
              
                Setting::updateOrCreate(['key' => 'logo'], ['value' => null]);
            }
             if ($request->has('logo_footer')) {
                if ($request->input('logo_footer') != "undefined") {
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('logo_footer'))));
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name = time() . '_logo_settings.' . $extension;
                    $file->move('public/settings', $file_name);
                    Setting::updateOrCreate(['key' => 'logo_footer'], ['value' => 'settings/' . $file_name]);
                }
            } else {
              
                Setting::updateOrCreate(['key' => 'logo_footer'], ['value' => null]);
            }
            
             
            if ($request->has('about')) {
                if ($request->input('about') != "undefined") {
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('about'))));
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name = time() . '_about_settings.' . $extension;
                    $file->move('public/settings', $file_name);
                    Setting::updateOrCreate(['key' => 'about'], ['value' => 'settings/' . $file_name]);
                }
            } else {
                Setting::updateOrCreate(['key' => 'about'], ['value' => null]);
            }
            if ($request->has('structure')) {
                if ($request->input('structure') != "undefined") {
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('structure'))));
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name = time() . '_structure_settings.' . $extension;
                    $file->move('public/settings', $file_name);
                    Setting::updateOrCreate(['key' => 'structure'], ['value' => 'settings/' . $file_name]);
                }
            } else {
                Setting::updateOrCreate(['key' => 'structure'], ['value' => null]);
            }

        } elseif ($request->setting_type == 'setting_2') {
            Setting::updateOrCreate(['key' => 'facebook'], ['value' => $request->facebook]);
            Setting::updateOrCreate(['key' => 'twitter'], ['value' => $request->twitter]);
            Setting::updateOrCreate(['key' => 'instagram'], ['value' => $request->instagram]);
            Setting::updateOrCreate(['key' => 'googleplus'], ['value' => $request->googleplus]);
            Setting::updateOrCreate(['key' => 'website'], ['value' => $request->website]);
        } elseif ($request->setting_type == 'setting_3') {
            Setting::updateOrCreate(['key' => 'meta_title'], ['value' => $request->meta_title]);
            Setting::updateOrCreate(['key' => 'meta_description'], ['value' => $request->meta_description]);
            Setting::updateOrCreate(['key' => 'meta_keywords'], ['value' => implode(',', $request->meta_keywords)]);
            if ($request->has('metaimage')) {
                if ($request->input('metaimage') != "undefined") {
                    $file = new File(storage_path('tmp/uploads/' . basename($request->input('metaimage'))));
                    $extension = pathinfo($file, PATHINFO_EXTENSION);
                    $file_name = time() . '_metaimage_settings.' . $extension;
                    $file->move('public/settings', $file_name);
                    Setting::updateOrCreate(['key' => 'metaimage'], ['value' => 'settings/' . $file_name]);
                }
            } else {
                Setting::updateOrCreate(['key' => 'metaimage'], ['value' => null]);
            }
        } elseif ($request->setting_type == 'setting_4') {
               Setting::updateOrCreate(['key' => 'count_courses'], ['value' => $request->count_courses]);
            Setting::updateOrCreate(['key' => 'count_benificair'], ['value' => $request->count_benificair]);
            Setting::updateOrCreate(['key' => 'count_centers'], ['value' => $request->count_centers]);
            Setting::updateOrCreate(['key' => 'count_associations'], ['value' => $request->count_associations]);
        } elseif ($request->setting_type == 'setting_5') {
            Setting::updateOrCreate(['key' => 'font_size'], ['value' => $request->font_size]);
            Setting::updateOrCreate(['key' => 'sidemenu_background'], ['value' => $request->sidemenu_background]);
            Setting::updateOrCreate(['key' => 'sidemenu_font_color'], ['value' => $request->sidemenu_font_color]);
            Setting::updateOrCreate(['key' => 'sidemenu_icon_color'], ['value' => $request->sidemenu_icon_color]);
            Setting::updateOrCreate(['key' => 'font_link'], ['value' => implode(',', $request->font_link)]);
            Setting::updateOrCreate(['key' => 'font_name'], ['value' => implode(',', $request->font_name)]);
        }


        Artisan::call('cache:clear');

        Alert::success('تم بنجاح', 'تم تعدبل البيانات بنجاح');

        return redirect()->route('admin.settings.index', ['setting_type' => $request->setting_type]);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Setting();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
