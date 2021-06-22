<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class AddPersonController extends Controller
{

    public function store(Request $resquest)
    {
        Person::create([
            'firstname' => $resquest->firstname,
            'lastname' => $resquest->lastname
        ]);

        return back()->with([
            'created' => true,
            'message'=>'Registration successful'
        ]);
    }
}
