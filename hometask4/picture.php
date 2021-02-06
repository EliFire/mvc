<?php

require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('kiss.jpg');

$img->resize(200, null, function (\Intervention\Image\Constraint $constraint) {
    $constraint->aspectRatio();
});

$img->text('City kiss, Moscow', $img->getWidth() - 10, $img->getHeight() - 10, function (\Intervention\Image\AbstractFont $font) {
    $font->size(18);
    $font->file('verdana.ttf');
    $font->color(array(255, 0, 0, 0.5));
    $font->align('right');
    $font->valign('bottom');
});

$img->save('saved.jpg');

echo $img->response('jpg');