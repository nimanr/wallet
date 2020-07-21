<?php

namespace Tests\Feature;

use App\Payment;
use App\User;
use App\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_will_be_redirected_login_page_from_payment_view(){
        $response = $this->get("/wallets/1/payments/create")->assertRedirect('/login');
    }


    /** @test */
    public function a_users_without_wallets_can_not_see_payments(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->get("/wallets/1/payments/create")->assertStatus(404);
    }

    /** @test */

    public function a_users_with_wallets_can_see_payments(){

        $this->actingAs(factory(User::class)->create([]));

        $this->post("/wallets", ['name'=>'test name']);

        $response = $this->get("/wallets/1/payments/create")->assertStatus(200);

    }

    /** @test */

    public function a_payment_can_be_added(){

        $user = $this->actingAs(factory(User::class)->create([]));

        $wallet = factory(Wallet::class)->create([]);

        $this->post("/wallets/{$wallet->id}/payments", ['amount'=>1000,'side'=>'Sent']);

        $this->assertCount(1,Payment::all());

    }


    /** @test */
    public function a_payment_amount_is_required(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->post("/wallets", ['amount'=>'','side'=>'Sent']);

        $this->assertCount(0,Payment::all());

    }


    /** @test */
    public function a_payment_side_is_required(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->post("/wallets", ['amount'=>1000,'side'=>'']);

        $this->assertCount(0,Payment::all());

    }
    /* CRUD: CRETE Start */
}
