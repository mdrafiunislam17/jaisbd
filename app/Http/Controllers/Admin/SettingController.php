<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SettingController extends Controller
{
    private array $settings;

    public function __construct()
    {
        $this->settings = Setting::query()->pluck("value", "setting_name")->toArray();
    }

    /**
     * Display settings page.
     *
     * @return View
     */
    public function index(): View
    {
        return view("admin.settings.index", $this->compactSetting());
    }

    /**
     * Update settings with text and file inputs.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            "SETTING_SITE_LOGO"      => "nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "SETTING_SITE_FAVICON"   => "nullable|file|mimes:jpeg,png,gif,ico",
            "SETTING_ABOUT_PAGE"     => "nullable|file|mimes:jpeg,png,gif",
            "SETTING_PAGE_BANNER"    => "nullable|file|mimes:jpeg,png,gif",
        ], [
            "SETTING_SITE_LOGO.mimes"     => "Logo must be jpeg, png, jpg, gif, or svg.",
            "SETTING_SITE_FAVICON.mimes" => "Favicon must be jpeg, png, gif, or ico.",
            "SETTING_ABOUT_PAGE.mimes"   => "About page image must be jpeg, png, or gif.",
            "SETTING_PAGE_BANNER.mimes"  => "Banner image must be jpeg, png, or gif.",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorText = "&#x2022; " . implode("<br>&#x2022; ", $errors);

            return redirect(route("setting.index"))->with("error", $errorText);
        }

        try {
            // Text-based settings
            $textSettings = [
                "SETTING_SOCIAL_FACEBOOK",
                "SETTING_SOCIAL_YOUTUBE",
                "SETTING_SOCIAL_INSTAGRAM",
                "SETTING_SOCIAL_LINKEDIN",
                "SETTING_SOCIAL_TWITTER",
                "CONTACT_EMAIL",
                "CONTACT_PHONE",
                "CONTACT_ADDRESS",
                "CONTACT_GOOGLE_MAP",
                "SETTING_ABOUT_US",
            ];

            foreach ($textSettings as $settingName) {
                $value = $request->input($settingName);
                if ($value !== null) {
                    Setting::query()
                        ->where("setting_name", $settingName)
                        ->update(["value" => $value]);
                    $this->settings[$settingName] = $value;
                }
            }

            // File-based settings
            $this->handleFileUpload($request, 'SETTING_SITE_LOGO', 'logo');
            $this->handleFileUpload($request, 'SETTING_SITE_FAVICON', 'favicon');
            $this->handleFileUpload($request, 'SETTING_PAGE_BANNER', 'banner');
            $this->handleFileUpload($request, 'SETTING_ABOUT_PAGE', 'aboutpage');

            return redirect(route("setting.index"))->with("success", "Settings updated successfully!");

        } catch (Exception $exception) {
            Log::error("Settings update failed: " . $exception->getMessage(), [
                'exception' => $exception
            ]);
            return redirect(route("setting.index"))->with("error", "Failed to update settings.");
        }
    }

    /**
     * Handle file upload and DB update.
     *
     * @param Request $request
     * @param string $settingName
     * @param string $filePrefix
     */
    private function handleFileUpload(Request $request, string $settingName, string $filePrefix): void
    {
        if ($request->hasFile($settingName)) {
            $file = $request->file($settingName);
            $fileName = $filePrefix . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Delete old file
            $oldFile = $this->settings[$settingName] ?? null;
            if ($oldFile && File::exists(public_path('uploads/' . $oldFile))) {
                File::delete(public_path('uploads/' . $oldFile));
            }

            // Move new file to public/uploads
            $file->move(public_path('uploads'), $fileName);

            // Save filename in DB
            Setting::query()->where('setting_name', $settingName)->update(['value' => $fileName]);
            $this->settings[$settingName] = $fileName;
        }
    }

    /**
     * Return settings for view.
     *
     * @return array
     */
    private function compactSetting(): array
    {
        return ['settings' => $this->settings];
    }
}
