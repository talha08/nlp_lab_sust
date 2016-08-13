<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Crawler;

class CrawlerController extends Controller
{


    public  function prothomAlo(){

        ini_set('MAX_EXECUTION_TIME', -1);

        //set url
        $url = "http://www.prothom-alo.com/bangladesh/article?page=2";

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);
        $body = (string)$response->getBody();
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $body = mb_convert_encoding($body, 'HTML-ENTITIES', "UTF-8");
        $dom->loadHTML($body);
        libxml_clear_errors();
        $xpath = new \DOMXpath($dom);


        //Getting all data
         $table_rows = $xpath->query('//h2[@class="title"]/a/@href');


        $data = array();
        foreach ($table_rows as $row => $tr) {
            foreach ($tr->childNodes as $td) {
                $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
            }
            $data[$row] = array_values(array_filter($data[$row]));


            $crawl = new Crawler();
            for ($j = 0; $j < count($data); $j++) {
                $detail = 'http://www.prothom-alo.com/bangladesh/'.$data[$j][0];

                $check = Crawler::where('news_link', '=', $detail)
                    ->count();

                if ($check == 0) {

                    $crawl->news_link = $detail;

                    try {
                        $crawl->save();
                    } catch (Exception $e) {

                    }

                }


            }

        }






//     echo '<pre>';
//       print_r($data);




        //second part started here
        $count = Crawler::where('news_link', 'like', 'http://www.prothom-alo.com/bangladesh/article/%')
            ->get();

        foreach ($count as $countNum) {

            $ch = curl_init($countNum->news_link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $page = curl_exec($ch);

            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($page);
            libxml_clear_errors();
            $xpath = new \DOMXpath($dom);

            $data = array();

            $table_rows = $xpath->query('//h1[@class="title mb10"]|
                                           //div[@itemprop="articleBody"]|
                                           //div[@class="fl topic_list"]|
                                           //span[@itemprop="datePublished"]
                                           ');

            foreach ($table_rows as $row => $tr) {
                foreach ($tr->childNodes as $td) {
                    $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
                }
                $data[$row] = array_values(array_filter($data[$row]));

            }

            Crawler::where('news_link', $countNum->news_link)->update([
                'title' => $data[0][0],
                'details' =>$data[2][0],
                'newspaper' => 'Prothom-Alo',
                'date' => $data[1][0],
                'section' => $data[3],
            ]);

        }



    }




    public  function test()
    {

        ini_set('MAX_EXECUTION_TIME', -1);

        //set url
        $url = "http://www.prothom-alo.com/api/content_management/search/?&q=%E0%A6%A8%E0%A6%BE%E0%A6%B0%E0%A7%80+&page_id=&content=&start=40&per_page=10";

        $client = new \GuzzleHttp\Client();
        $response = $client->get($url);
        $body = (string)$response->getBody();
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $body = mb_convert_encoding($body, 'HTML-ENTITIES', "UTF-8");
        $dom->loadHTML($body);
        libxml_clear_errors();
        $xpath = new \DOMXpath($dom);


        //Getting all data
        $table_rows = $xpath->query('//h3[@class !="subtitle"]');


        $data = array();
        foreach ($table_rows as $row => $tr) {
            foreach ($tr->childNodes as $td) {
                $data[$row][] = preg_replace('~[\r\n]+~', '', trim($td->nodeValue));
            }
            $data[$row] = array_values(array_filter($data[$row]));


        }

          echo '<pre>';
          print_r($data);
    }








    }
