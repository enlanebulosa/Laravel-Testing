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
