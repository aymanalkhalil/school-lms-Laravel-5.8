<?php

namespace App\Http\Controllers;

use App\Advertisment;
use App\Programme;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function view_diplome_information(Programme $id)
    {
        $get_all_adv = Advertisment::where('programme_id', $id->id)->get();
        return view('diplomas', compact('get_all_adv', 'id'));
    }
}