<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegulasiController extends Controller
{
    public function ourRegulations()
    {
        $regulations = Regulasi::paginate(10);

        foreach ($regulations as $key => $reg) {
            if (Storage::disk('public')->exists("regulasi/" . $reg->file_path)) {
                $regulations[$key]->file_size = number_format(Storage::disk('public')->size("regulasi/" . $reg->file_path) / 1000000, 2);
                $reg->file_path = Storage::disk('public')->url('regulasi/'.$reg->file_path);
            } else {
                $regulations[$key]->file_size = '0.00';
            }
        }

        return view('intranet.pages.our_regulation', compact('regulations'));
    }
}
