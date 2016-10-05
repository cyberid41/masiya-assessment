<?php

namespace App\Services;

class ApiService {

    protected $API_URL = "http://rimbunesia.com/tes-masiya/data.xml";

    public function getListEmployee($orderBy){
        try {
            $order = ($orderBy == null ? 'city' : $orderBy);

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

            array_multisort($sortArray[$order],SORT_ASC,$employee);

            return $this->_group_by($employee,$order);

        } catch (\Exception $e) {
            
            return $e;
        }
    }

    public function getData(){
         return xml_to_json($this->API_URL);
    }

    function _group_by($array, $key) {
        $return = [];
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }

}