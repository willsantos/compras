<?php

namespace Tests\Feature;

use App\ShopList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopListTests extends TestCase
{
    use RefreshDatabase;

    public function testInsertShopList(): void
    {
        $data = [
            'name' => 'Lista de compras de Teste',
        ];

        $shopList = ShopList::create($data);

        $this->assertDatabaseHas('shop_lists', ['id' => $shopList->id]);
        $this->assertDatabaseHas('shop_lists', ['name' => $shopList->name]);

    }
}
