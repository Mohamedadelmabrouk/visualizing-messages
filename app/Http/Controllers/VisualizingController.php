<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use stdClass;

class VisualizingController extends Controller
{
    //function that make a call to the spreadsheet to fetch json data
    public function Visualizing()
    {
        //open api call to spreadsheet with  guzzle client 
        $return = [];
        $client = new Client();
        $connection = $client->get('https://spreadsheets.google.com/feeds/list/0Ai2EnLApq68edEVRNU0xdW9QX1BqQXhHRl9sWDNfQXc/od6/public/basic?alt=json');
        $Body = $connection->getBody();
        $allentry = json_decode($Body)->feed->entry;
        foreach ($allentry as $key => $entry) {
            $newClassObject = new stdClass();
            $newClassObject->data = $entry->content;
            $dataIntoArray = (array) $newClassObject->data;
            $explodeData = explode(',', $dataIntoArray['$t']);
            array_push($return, $explodeData);
        }
        //now we call another function to sort data 
        $data = $this->ExplodeData($return);
        return view('visualization', with(['data'=>$data]));
    }
    // function to sort and fetch data from my destination file
    public function ExplodeData($explodeData)
    {
        $returnsortedData = [];
        $k = array();
        foreach ($explodeData as $key => $singleArray) {
            for ($counter = 0; $counter < count($singleArray); $counter++) {
                if (str_contains($singleArray[$counter], ':')) {
                    list($k, $v) = explode(':', $singleArray[$counter]);
                    $returnsortedData[$key][$k] = $v;
                } else {
                    $returnsortedData[$key]['country'.$counter] = $singleArray[$counter];
                }
            }
           
        }
        return $returnsortedData;
    }
}
