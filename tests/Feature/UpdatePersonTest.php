<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Person;
use Tests\TestCase;

class UpdatePersonTest extends TestCase
{
    use RefreshDatabase;
    
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
}
