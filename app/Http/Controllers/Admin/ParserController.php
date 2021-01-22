<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    
    
    public function index()
    {
        $xml = XmlParser::load('https://news.rambler.ru/rss/world/');
        $data = $xml->parse([
            'items' => ['uses' => 'channel.item[guid,title,description,link,author]'],
        ]);
        
        foreach($data['items'] as $key => $value){
            $news = News::where('id', '=', $value['guid'])->first();
            if(!$news){
                $insert[] = [
                    'id' => $value['guid'],
                    'title' => $value['title'],
                    'content' => $value['description'],
                    'link' => $value['link'],
                    'author' => $value['author']
                ];
            }
        }

        if(!empty($insert)){ 
            DB::table('news')->insert($insert);
        }

        return redirect()->route('admin::news');
    }
}