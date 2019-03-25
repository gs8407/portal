<?php
function resizeImage($image)
{
    $square = 150;

    // Load up the original image
    $src = $image;
    $w = imagesx($src); // image width
    $h = imagesy($src); // image height


    // Create output canvas and fill with black
    $final = imagecreatetruecolor($square, $square);
    $bg_color = imagecolorallocate($final, 000, 000, 000);
    imagefill($final, 0, 0, $bg_color);

    // Check if portrait or landscape
    if ($h >= $w) {
        // Portrait, i.e. tall image
        $newh = $square;
        $neww = intval($square * $w / $h);

        // Resize and composite original image onto output canvas
        imagecopyresampled(
            $final, $src,
            intval(($square - $neww) / 2), 0,
            0, 0,
            $neww, $newh,
            $w, $h);
    } else {
        // Landscape, i.e. wide image
        $neww = $square;
        $newh = intval($square * $h / $w);
        imagecopyresampled(
            $final, $src,
            0, intval(($square - $newh) / 2),
            0, 0,
            $neww, $newh,
            $w, $h);
    }

    // Give result
    return $final;

}

    $imageProcess = 0;
    if (is_array($_FILES)) {
        $fileName = $_FILES['upload_image']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "./images/";
        $fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagegif($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagepng($imageLayer, $uploadPath . $resizeFileName . '.' . $fileExt);
                break;

            default:
                $imageProcess = 0;
                break;
        }
        $imageProcess = 1;
    }

    $imageProcess = 0;

echo  $uploadPath . $resizeFileName . '.' . $fileExt ;


?>


