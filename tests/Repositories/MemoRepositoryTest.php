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
