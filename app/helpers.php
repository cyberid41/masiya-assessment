<?php


if (!function_exists('xml_to_json')) {
    /**
     * Instance convert XML to Json
     *
     * @param $xml
     *
     * @return string
     */
    function xml_to_json($xml)
    {
        // read the XML database of aminoacids
        $data = implode("", file($xml));
        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $data, $values, $tags);
        xml_parser_free($parser);

        // loop through the structures
        foreach ($tags as $key=>$val) {
            if ($key == "row") {
                $molranges = $val;
                // each contiguous pair of array entries are the 
                // lower and upper range for each molecule definition
                for ($i=0; $i < count($molranges); $i+=2) {
                    $offset = $molranges[$i] + 1;
                    $len = $molranges[$i + 1] - $offset;
                    $tdb[] = json(array_slice($values, $offset, $len));
                }
            } else {
                continue;
            }
        }
        return $tdb;
    }
}

if (!function_exists('json')) {
    /**
     * Get the Json has been converted from Xml
     *
     * @param $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    function json($data)
    {
        for ($i=0; $i < count($data); $i++) {
            $mol[$data[$i]["attributes"]["name"]] = $data[$i]["value"];
        }

        return $mol;
    }
}

if (!function_exists('get_status')) {

    function get_status($status)
    {
        switch ($status) {
            case 1:
                return "Masuk";
                break;
            case 2:
                return "Cuti";
                break;
            case 3:
                return "Libur";
                break;
            default:
                return "Masuk";
        }
    }
}

if (!function_exists('get_status_color')) {

    function get_status_color($status)
    {
        switch ($status) {
            case 1:
                return "#659330";
                break;
            case 2:
                return "#D74456";
                break;
            case 3:
                return "#C1C1C1";
                break;
            default:
                return "#659330";
        }
    }
}