<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(News $news)
    {
        $news->load('poster');
        return response()->json($news);
    }
}
