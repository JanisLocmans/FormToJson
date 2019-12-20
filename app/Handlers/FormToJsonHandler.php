<?php

namespace App\Handlers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\File;
use Psy\Util\Json;


class FormToJsonHandler {

    private $data_path;

    public function __construct()
    {
        $this->data_path = public_path(). '/data';
    }

    /**
     * @param $data array;
     * @return Json;
     */
    public function convertFormToJson($data) {
        $imgName = $this->saveImage($data['image']);
        $json = json_encode($this->formatJson($data, $imgName));
        if (!file_exists($this->data_path)) {
            File::makeDirectory($this->data_path, 0777, true, true);
        }
        file_put_contents($this->data_path . "/" .time() .$data['name'] .'.json', $json);
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
