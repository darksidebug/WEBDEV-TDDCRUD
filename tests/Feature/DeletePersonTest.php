<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Person;
use Tests\TestCase;

class DeletePersonTest extends TestCase
{
    use RefreshDatabase;

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
