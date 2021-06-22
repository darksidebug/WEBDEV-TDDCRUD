<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
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
