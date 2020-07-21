<?php

namespace Tests\Feature;

use App\User;
use App\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WalletTest extends TestCase
{
    use RefreshDatabase;

    /* CRUD: READ Start */
    /** @test */
    public function unauthenticated_users_will_be_redirected_login_page_from_wallet_view(){
        $response = $this->get("/wallets")->assertRedirect('/login');
    }

    /** @test */
    public function inactivated_users_will_be_redirected_verifiy_page_from_wallet_view(){
        $this->actingAs(factory(User::class)->create(['email_verified_at'=>NULL]));
        $response = $this->get("/wallets")->assertRedirect('/email/verify');
    }
    /* CRUD: READ End */

    /** @test */
    public function activated_authenticated_users_can_see_wallets(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->get("/wallets")->assertStatus(200);
    }

    /* CRUD: CRETE Start */
    /** @test */

    public function a_wallet_can_be_added(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->post("/wallets", ['name'=>'test name']);

        $this->assertCount(1,Wallet::all());

    }

    /** @test */
    public function a_wallet_name_is_required(){

        $this->actingAs(factory(User::class)->create([]));

        $response = $this->post("/wallets", ['name'=>'']);

        $this->assertCount(0,Wallet::all());

    }
    /* CRUD: CRETE Start */
}
