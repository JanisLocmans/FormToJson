<?php

namespace App\Handlers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\UrlGenerator;


class FormToJsonHandler {

    /**
     * @param $data array;
     */
    public function convertFormToJson($data) {
        $imgName = $this->saveImage($data['image']);
        $json = json_encode($this->formatJson($data, $imgName));
        file_put_contents(public_path() .'/data/' .time() .$data['name'] .'.json', $json);
        return $json;
    }

    /**
     * @param $image UploadedFile;
     * @return string;
     */
    private function saveImage($image) {
        $mime = $image->getClientOriginalExtension();
        $name = time() . str_random(10) . '.' . $mime;
        $image->move(public_path(). '/img/', $name);
        return $name;
    }

    /**
     * @param $data array;
     * @param $imgName string;
     * @return array;
     */
    private function formatJson($data, $imgName) {
        return [
            "name" => $data['name'],
            "surname" => $data['surname'],
            "birth-date" => $data['birth-date'],
            "imgPath" => url()->to('/').'/img/'.$imgName,
        ];
    }
}
