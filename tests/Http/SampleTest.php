<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SampleTest extends TestCase
{
    /** @test */
    public function visit_sample_page()
    {
        $this->visit('/sample');
    }

    /** @test */
    public function sample_page_url_is_sample()
    {
        $this->visit('/sample')
            ->seePageIs('/sample');
    }

    /** @test */
    public function see_header_title_is_top()
    {
        $this->visit('/sample')
            ->see('サンプルページ トップ');
    }

    /** @test */
    public function dont_see_header_title_is_list()
    {
        $this->visit('/sample')
            ->dontSee('サンプルページ 一覧');
    }

    /** @test */
    public function see_h1_in_sample_top()
    {
        $this->visit('/sample')
            ->seeInElement('h1', 'サンプルページ トップ');
    }

    /** @test */
    public function dont_see_h1_in_sample_list()
    {
        $this->visit('/sample')
            ->dontSeeInElement('h2', 'サンプルページ トップ');
    }

    /** @test */
    public function see_sitemap_link()
    {
        $this->visit('/sample')
            ->seeLink('サイトマップ', "/sitemap");
    }

    /** @test */
    public function see_test_input_in_value()
    {
        $this->visit('/sample')
            ->seeInField('testInput', "value1");
    }

    /** @test */
    public function dont_see_test_input_in_in_value()
    {
        $this->visit('/sample')
            ->dontSeeInField('testInput', "value2");
    }

    /** @test */
    public function see_test_textarea_in_value()
    {
        $this->visit('/sample')
            ->seeInField('testTextArea', "Laravel Testing is EASY.");
    }

    /** @test */
    public function dont_see_test_textarea_in_value()
    {
        $this->visit('/sample')
            ->dontSeeInField('testTextArea', "Rails Testing is EASY.");
    }

    /** @test */
    public function see_checkbox_checked()
    {
        $this->visit('/sample')
            ->seeIsChecked('testCheckBox1');
    }

    /** @test */
    public function dont_see_checkbox_checked()
    {
        $this->visit('/sample')
            ->dontSeeIsChecked('testCheckBox2');
    }

    /** @test */
    public function see_select_option_selected()
    {
        $this->visit('/sample')
            ->seeIsSelected('testSelect', 'laravel');
    }

    /** @test */
    public function donts_see_select_option_selected()
    {
        $this->visit('/sample')
            ->dontSeeIsSelected('testSelect', 'cake');
    }

    /** @test */
    public function all_test()
    {
        $this->visit('/sample')
            ->seePageIs('/sample')
            ->see('サンプルページ トップ')
            ->dontSee('サンプルページ 一覧')
            ->seeInElement('h1', 'サンプルページ トップ')
            ->dontSeeInElement('h2', 'サンプルページ トップ')
            ->seeLink('サイトマップ', "/sitemap")
            ->dontSeeInField('testInput', "value2")
            ->seeInField('testTextArea', "Laravel Testing is EASY.")
            ->dontSeeInField('testTextArea', "Rails Testing is EASY.")
            ->seeIsChecked('testCheckBox1')
            ->dontSeeIsChecked('testCheckBox2')
            ->seeIsSelected('testSelect', 'laravel')
            ->dontSeeIsSelected('testSelect', 'cake');
    }
}
