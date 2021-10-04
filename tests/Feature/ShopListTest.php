<?php

namespace Tests\Feature;

use App\ShopList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopListTest extends TestCase
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

    public function testSoftDeletesShopList(): void
    {

        $data = [
            'name' => 'Lista de compras de Teste',
        ];

        $shopList = ShopList::create($data);

        $shopList::destroy($shopList->id);

        $this->assertSoftDeleted('shop_lists', [
            'name' => $shopList->name,
        ]);

    }
}
