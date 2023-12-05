<?php
use App\Libraries\Claviska\SimpleImage;

if (!function_exists('processAndUploadImage')) {
    function processAndUploadImage($file)
    {
        $image = new SimpleImage();

        if ($file->isValid() && !$file->hasMoved()) {
            $imagePath = $file->getTempName();
            $image->fromFile($imagePath)->resize(200, 250)->toFile($imagePath);
            $imageName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $imageName);

            $imageData = base64_encode(file_get_contents(WRITEPATH . 'uploads/' . $imageName));

            return $imageData;
        }

        return null; // or handle the error as needed
    }
}