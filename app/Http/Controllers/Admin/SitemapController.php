<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

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
        $result = json_decode($json, TRUE);

        return $result['url'];
    }

    public function generate()
    {
        $generateSitemapCommand = 'sitemap:generate';
        try {
            ini_set('max_execution_time', 600);
            Artisan::call($generateSitemapCommand);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        return response()->json([], 204);
    }

    public function show()
    {
        $sitemap = File::get(public_path('sitemap.xml'));
        return response($sitemap)
            ->withHeaders([
                'Content-Type' => 'text/xml'
            ]);
    }
}
