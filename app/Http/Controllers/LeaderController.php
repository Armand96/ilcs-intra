<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeaderController extends Controller
{
    public function ourLeader()
    {
        $divisis = [
            array(
                'name' => 'Board Of Comission',
                'icon' => 'boc-icon.svg'
            ),
            array(
                'name' => 'Board Of Directors',
                'icon' => 'bod-icon.svg'
            ),
            array(
                'name' => 'Board Of Management',
                'icon' => 'bom-icon.svg'
            ),
        ];

        $leaders = array(
            'boc' => Leader::where('divisi', $divisis[0])->with('user')->get(),
            'bod' => Leader::where('divisi', $divisis[1])->with('user')->get(),
            'bom' => Leader::where('divisi', $divisis[2])->with('user')->get(),
        );

        foreach ($leaders['boc'] as $key => $usr) {
            if (Storage::disk('public')->exists("profile_picture/" . $usr->user->image_user)) {
                $usr->user->image_user = Storage::disk('public')->url('profile_picture/' . $usr->user->image_user);
            }
        }
        foreach ($leaders['bod'] as $key => $usr) {
            if (Storage::disk('public')->exists("profile_picture/" . $usr->user->image_user)) {
                $usr->user->image_user = Storage::disk('public')->url('profile_picture/' . $usr->user->image_user);
            }
        }
        foreach ($leaders['bom'] as $key => $usr) {
            if (Storage::disk('public')->exists("profile_picture/" . $usr->user->image_user)) {
                $usr->user->image_user = Storage::disk('public')->url('profile_picture/' . $usr->user->image_user);
            }
        }

        return view('intranet.pages.our_leader', compact('leaders', 'divisis'));
    }

    public function show(Leader $leader)
    {
        $leader->load('user');
        if (Storage::disk('public')->exists("profile_picture/" . $leader->user->image_user)) {
            $leader->user->image_user = Storage::disk('public')->url('profile_picture/' . $leader->user->image_user);
        }
        return response()->json($leader);
    }
}
