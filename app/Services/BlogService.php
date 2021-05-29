<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BlogService
{
    /**
     * Загрузка картинки для поста блога
     *
     * @param $request
     * @param $image
     * @return path or null
     */
    public function uploadImage($request, $image = null)
    {
        //Обработка картинки, если есть
        if($request->hasFile('img')){

            //Удаление старой картинки, если грузим новую
            if($image){
                Storage::delete($image);
            }

            $img = $request->file('img');
            $folderYear = date('Y');
            $folderMonth = date('m');
            $imgName = Str::slug($request->title) . "-{$folderMonth}-{$folderYear}.{$img->extension()}";
            $imgPath = "uploads/images/{$folderYear}/{$folderMonth}/{$imgName}";

            Image::make($img)->crop(700, 300)
                ->save(storage_path("app/public/{$imgPath}"));

            return $imgPath;
        }

        return null;
    }
}
