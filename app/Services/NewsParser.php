<?php


namespace App\Services;

use Exception;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    public function parse($source)
    {
        try {
            $xml = XmlParser::load($source);
            $data = $xml->parse([
              'items' => ['uses' => 'channel.item[guid,title,description,link,author]'],
            ]);
        } catch (Exception $e){
            dd($source);
        }
    }
}