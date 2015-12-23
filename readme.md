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
% php vendor/bin/phpunit tests/Http
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


## HTTP TestCase

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
    public function testExample()
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

## Elequent TestCase

```php
<?php

use App\Memo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemoTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testExample()
    {
        factory(Memo::class)->create(['text' => 'テストメモ1']);
        factory(Memo::class)->create(['text' => 'テストメモ2']);
        factory(Memo::class)->create(['text' => 'テストメモ3']);

        $memos = Memo::all();

        $this->assertCount(3, $memos);

        $this->assertEquals('テストメモ1', Memo::first()->text);

        $this->assertEquals('テストメモ3', Memo::last1()->text);
    }
}

```


## Repository TestCase

```php
<?php

use App\Repositories\MemoRepositoryInterface;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MemoRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected $repo;

    public function setUp()
    {
        parent::setUp();
        $this->repo = $this->app->make(MemoRepositoryInterface::class);
    }

    public function testExample()
    {
        $this->repo->create('Spiral Life');
        $this->repo->create('LR');
        $this->repo->create('Minekawa Takako');

        $memos = $this->repo->getAll();

        $this->assertCount(3, $memos);

        $this->assertEquals('Spiral Life', $memos[0]->text);
    }
}

```
