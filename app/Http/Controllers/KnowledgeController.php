<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KnowledgeController extends Controller
{
    public function knowledge(Request $request){

        $knowledges = Knowledge::all();

        foreach ($knowledges as $key => $reg) {
            if (Storage::disk('public')->exists("knowledge/" . $reg->file_path)) {
                $knowledges[$key]->file_size = number_format(Storage::disk('public')->size("knowledge/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('knowledge/'.$reg->file_path);
            } else {
                $knowledges[$key]->file_size = '0.00';
            }
        }

        return view('intranet.pages.knowledge_management', compact('knowledges'));
    }
}
