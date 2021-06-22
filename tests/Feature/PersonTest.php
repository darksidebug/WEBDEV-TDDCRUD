<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_add_person()
    {
        $response=$this->post(route('person.store'),[
            'firstname'=>'Arman',
            'lastname'=>'Masangkay'
        ]);

        $response->assertSessionHasAll([
            'created'=>true,
            'message'=>'Registration successful'
        ]);

        $this->assertDatabaseCount('people',1);
        $this->assertDatabaseHas('people',[
            'firstname'=>'Arman',
            'lastname'=>'Masangkay'
        ]);
    }

    public function test_should_update_person()
    {
        $person=Person::create([
            'firstname'=>'Arman',
            'lastname'=>'Masangkay'
        ]);

        $response=$this->post(route('person.update',['id' => $person->id]));
        
        $response->assertSessionHasAll([
            'updated'=>true,
            'message'=>'Information updated successfully!'
        ]);
        
        $this->assertDatabaseCount('people',1);
        $this->assertDatabaseHas('people',[
            'firstname'=>'John',
            'lastname'=>'Doe'
        ]);
    }

    public function test_should_delete_person()
    {
        $person=Person::create([
            'firstname'=>'Arman',
            'lastname'=>'Masangkay'
        ]);

        $response=$this->post(route('person.delete',$person));
        
        $response->assertSessionHasAll([
            'deleted'=>true,
            'message'=>'Information deleted successfully!'
        ]);
        
        $this->assertDatabaseCount('people',0);

    }
}