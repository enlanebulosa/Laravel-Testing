## Laravel-Testing

## Usage

```
% git clone https://github.com/niiyz/Laravel-Testing.git
% cd Laravel-Testing
% composer install
```

## Testing

```
% php vendor/bin/phpunit
```

```
% php vendor/bin/phpunit --filter=SampleTest
```

```
% php vendor/bin/phpunit --filter=visit_sample_page
```

## Build in Server
```
% php -S localhost:8000 -t public 
```

## HTML

```html
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>サンプルページ トップ</h1>

    <h2>お知らせ</h2>

    <a href="http://localhost:8000/sitemap">サイトマップ</a>

    <input type="text" name="testInput" value="value1">

    <textarea name="testTextArea">Laravel Testing is EASY.</textarea>

    <input type="checkbox" id="testCheckBox1" value="Laravel" checked>
    <input type="checkbox" id="testCheckBox2" value="Rails">

    <select name="testSelect">
        <option value="cake">cake</option>
        <option value="laravel" selected>laravel</option>
        <option value="codeigniter">codeigniter</option>
    </select>
</body>
</html>
```

## TestCase

```php
<?php

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
```

