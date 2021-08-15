<?php

if (! function_exists('getImage')) {
    function getImage($imagePath)
    {
        if (is_null($imagePath)) {
            return asset('no_image.jpg');
        }

        return asset('storage/' . $imagePath);
    }
}