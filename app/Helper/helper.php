<?php

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
