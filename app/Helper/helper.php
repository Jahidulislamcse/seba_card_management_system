<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('setPageMeta')) {

    function setPageMeta($content = null, $metaName = "title")
    {
        if ($metaName == 'title')
            session()->put('page_meta_header', $content);
        session()->put('page_meta_' . $metaName, $content);
    }
}

if (!function_exists('getPageMeta')) {
    /**
     * get_page_meta
     *
     * @param string $metaName
     *
     * @return mixed
     */
    function getPageMeta($metaName = "title", $default = "")
    {
        if (session()->has('page_meta_' . $metaName)) {
            $title = session()->get("page_meta_" . $metaName);
//            session()->forget("page_meta_" . $metaName);
            return $title ?? $default;
        }
        return $default;
    }
}


if (!function_exists('getStorageImage')) {

    function    getStorageImage($name, $is_user = false, $type ='default')
    {
        if ($name && Storage::disk(config('filesystems.default'))->exists($name)) {
            return Storage::disk(config('filesystems.default'))->url($name);

        }
        return $is_user ? getUserDefaultImage() : ($type == 'logo' ? getDefaultLogo() :($type == 'favicon'? getDefaultFavicon()  :($type == 'wide_logo' ? getDefaultWideLogo() : getDefaultImage() )));
    }
}

function getUserDefaultImage()
{
    return asset('images/default/user_default.png');
}

function getDefaultLogo()
{
    return asset('images/default/logo-sm.png');
}
function getDefaultWideLogo()
{
    return asset('images/default/default_logo.png');
}
if (!function_exists('getDefaultFavicon')){
    function getDefaultFavicon(){
        return asset('images/default/favicon.ico');
    }
}
function getDefaultImage()
{
    return asset('images/default/default.webp');
}


if (!function_exists('monthNumberGenerate')) {

    function  monthNumberGenerate($month)
    {
        // Find the index of "September"
        $index = array_search($month, ENGLISH_MONTHS);
        return $index+1;
    }
}
