<?php
function doUploadImage($path, $photo,$unlink = null)
{

    $imageName = md5(time() . time()) . '.' . $photo->getClientOriginalExtension();
    $photo->move(public_path($path), $imageName);
    return $imageName;
}

if (! function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}
