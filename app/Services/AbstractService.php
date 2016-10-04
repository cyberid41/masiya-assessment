<?php

namespace App\Services;

class AbstractService {

    protected $client;

    protected $API_URL = "http://rimbunesia.com/tes-masiya/data.xml";

    public function getListEmployee(){
        try {

            $list = xml_to_json($this->API_URL);

            return $list;

        } catch (\Exception $e) {
            
            return $e;
        }
    }

}