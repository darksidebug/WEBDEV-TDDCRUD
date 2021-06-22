<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class DeletePersonController extends Controller
{
    public function delete(Person $person)
    {
        $reponse = Person::find($person->id);
        $reponse->delete();

        return back()->with([
            'deleted'=>true,
            'message'=>'Information deleted successfully!'
        ]);
    }
}
