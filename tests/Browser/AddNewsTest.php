<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                    ->assertSee('Хорошие Новости')
                    ->type('title', '')
                    ->press('Создать')
                    ->assertSee('Укажите Заголовок Новости')
                    ->type('title', 're')
                    ->press('Создать')
                    ->assertSee('Количество символов в поле Заголовок должно быть не меньше 3.')
                    ->type('content', '')
                    ->press('Создать')
                    ->assertSee('Напишите Текст Новости')
            ;
        });
    }
}
