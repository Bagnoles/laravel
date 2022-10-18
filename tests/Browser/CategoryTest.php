<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/addCategory')
                ->type('name', 'Новая')
                ->type('slug', 'newone')
                ->press('Добавить')
                ->assertSee('Категории новостей');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/editCategory/1')
                ->type('name', 'Измененная')
                ->type('slug', 'change')
                ->press('Сохранить')
                ->assertPathIs('/news');
        });
    }
}
