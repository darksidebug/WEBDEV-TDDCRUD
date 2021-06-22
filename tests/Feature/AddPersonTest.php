<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddPersonTest extends TestCase
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
}
