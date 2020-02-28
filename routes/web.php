<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\File;

Route::view('/', 'welcome');
// Route::get('/sitemap', function() {
//     $sitemap = File::get(public_path('sitemap.xml'));
//     return response($sitemap)
//         ->withHeaders([
//             'Content-Type' => 'text/xml'
//         ]);
// });
