<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function __construct()
    {
        $this->sitemapPath = public_path('sitemap.xml');
    }

    public function index()
    {
        // SitemapGenerator::create('http://www.leotive.com')->writeToFile($sitemapPath);
        return view('admin.sitemap.index');
    }

    public function data()
    {
        $sitemapData = $this->collectSitemapData();
        return datatables()->collection($sitemapData)->toJson();
    }

    private function collectSitemapData(): array
    {
        $xml_string = file_get_contents($this->sitemapPath);
        $xml = simplexml_load_string($xml_string);
        $json = json_encode($xml);
        $result = json_decode($json,TRUE);

        return $result['url'];
    }
}
