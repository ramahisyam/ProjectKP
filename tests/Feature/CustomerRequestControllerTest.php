<?php

namespace Tests\Feature;

use App\Models\CustomerRequest;
use App\Models\User;;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CustomerRequestControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * @test
     */
    public function it_stores_data()
    {
        $faker = Faker::create('id_ID');

        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole('AM');
        $user->givePermissionTo('accountManager');

        // $customerRequest = factory(CustomerRequest::class)->create();

        $response = $this->actingAs($user)
        ->post(route('customer.store'), [
            'business_key' => 'OLO/' . random_int(100000, 999999),
            'name' => $faker->company,
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'latlong' => strval($faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber() . ', ' 
            . $faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber()),
            'address' => $faker->address,
            'capacity' => strval($faker->numberBetween(0,999)) . ' Mbps',
            'service_id' => $faker->numberBetween(1,2),
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('home'));
    }
}
