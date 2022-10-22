<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/add')
                    ->type('title', 'Заголовок')
                ->type('text', 'Длинный текст тестовой новости')
                ->press('Добавить')
                ->assertSee('Вернуться назад в категорию');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/editNews/1')
                ->type('title', 'Новый заголовок')
                ->type('text', 'Очень длинный текст тестовой новости')
                ->press('Сохранить')
                ->assertPathIs('/news/list');
        });
    }
}
