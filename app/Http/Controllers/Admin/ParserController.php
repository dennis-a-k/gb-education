<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsinJob;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    
    
    public function index()
    {
        $sources = [
            'https://news.rambler.ru/rss/world/',
            'https://news.rambler.ru/rss/tech/',
            'https://news.rambler.ru/rss/politics/',
            'https://news.rambler.ru/rss/community/',
            'https://news.rambler.ru/rss/Moscow/'
        ];
        
        foreach($sources as $source){
            NewsParsinJob::dispatch($source);
        }
    }
}