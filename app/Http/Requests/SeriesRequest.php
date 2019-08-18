<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{

    public function updateSeries($series)
    {
        if ($this->hasFile('image')) {
            $series->image_url = 'public/series/' .  $this->uploadSeriesImage()->fileName;
        }
        $series->title = $this->title;
        $series->description = $this->description;
        $series->slug = str_slug($this->title);
        $series->save();
    }

    public function uploadSeriesImage()
    {


        $uploadedImage = $this->image;
        $this->fileName = str_slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('public/series', $this->fileName);

        return $this;
    }
}
