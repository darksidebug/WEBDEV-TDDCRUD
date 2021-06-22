<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class UpdatePersonController extends Controller
{

    public function update($id)
    {

        $reponse = Person::find($id);
        $reponse->firstname = 'John';
        $reponse->lastname = 'Doe';
        $reponse->update();

        return back()->with([
            'updated' => true,
            'message'=>'Information updated successfully!'
        ]);
    }
}
