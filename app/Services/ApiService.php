<?php

namespace App\Services;

class ApiService {

    protected $API_URL = "http://rimbunesia.com/tes-masiya/data.xml";

    public function getListEmployee($orderBy){
        try {

            $employee = $this->getData();

            $sortArray = []; 

            foreach($employee as $person){ 
                foreach($person as $key=>$value){ 
                    if(!isset($sortArray[$key])){ 
                        $sortArray[$key] = array(); 
                    } 
                    $sortArray[$key][] = $value; 
                } 
            }

            array_multisort($sortArray[($orderBy == null ? 'city' : $orderBy)],SORT_ASC,$employee);

            return $employee;

        } catch (\Exception $e) {
            
            return $e;
        }
    }

    public function getData(){
         return xml_to_json($this->API_URL);
    }

}