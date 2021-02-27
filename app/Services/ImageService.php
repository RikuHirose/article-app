<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

/**
 * 画像を扱うclass
 */
class ImageService
{
    public function upload($image)
    {
        $fileName = $image->getClientOriginalName();

        $path = Storage::disk('s3')->putFileAs('/', $image, $fileName, 'public');
        $fullFilePath = Storage::disk('s3')->url($path);

        return $fullFilePath;
    }
}