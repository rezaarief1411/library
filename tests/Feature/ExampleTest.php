<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\Authors as AuthorsModel;

class ExampleTest extends TestCase
{
    public function testGetAuthorsEndpoint()
    {
        $response = $this->call('GET', 'api/authors');

        $array = json_decode($response->getContent());
        $result = false;
        if($array[0]->id == 1)
        {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }

    public function testGetAuthorsByIdEndpoint()
    {
        $response = $this->call('GET', 'api/authors/1');

        $array = json_decode($response->getContent());
        $result = false;
        if($array[0]->id == 1)
        {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }

    public function testAddAuthorsEndpoint()
    {
        $response = $this->post('/api/authors', [
            'name' => 'Johny',
            'bio' => "Johny's Bio",
            'birth_date' => '1989-03-14',
        ]);

        $response->assertStatus(201);
    }

    public function testUpdateAuthorsEndpoint()
    {
        $response = $this->put('/api/authors/1', [
            'name' => 'Amy',
            'bio' => "Amy's Bio",
            'birth_date' => '1989-07-14',
        ]);

        $response->assertStatus(200);
    }

    public function testRemoveAuthorsEndpoint()
    {
        $response = $this->delete('/api/authors/14');

        $response->assertStatus(200);
    }


    public function testGetBooksEndpoint()
    {
        $response = $this->call('GET', 'api/books');

        $array = json_decode($response->getContent());
        $result = false;
        if($array[0]->id == 1)
        {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }


    public function testGetBooksByIdEndpoint()
    {
        $response = $this->call('GET', 'api/books/1');

        $array = json_decode($response->getContent());
        $result = false;
        if($array[0]->id == 1)
        {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }

    public function testAddBooksEndpoint()
    {
        $response = $this->post('/api/books', [
            'title' => 'Si Kura-kura',
            'description' => "Cerita tentang si kura - kura",
            'publish_date' => '2004-03-14',
            'author_id' => 1
        ]);

        $response->assertStatus(201);
    }

    public function testUpdateBooksEndpoint()
    {
        $response = $this->put('/api/books/3',[
            'title' => 'Si Kura-kura',
            'description' => "Cerita tentang si kura - kura",
            'publish_date' => '2004-03-14',
            'author_id' => 1
        ]);

        $response->assertStatus(200);
    }

    public function testRemoveBooksEndpoint()
    {
        $response = $this->delete('/api/books/3');

        $response->assertStatus(200);
    }


}
