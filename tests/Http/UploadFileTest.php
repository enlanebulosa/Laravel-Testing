<?php

use Illuminate\Filesystem\Filesystem;

class UploadFileTest extends TestCase
{
    protected $file;

    public function setUp()
    {
        parent::setUp();

        $this->path = public_path('images/test.jpeg');

        // ファイル削除
        $this->file = new Filesystem();
        $this->file->delete($this->path);
    }

    /** @test */
    public function uploaded_file()
    {
        // ファイルがないことの検証
        $this->assertFalse($this->file->exists($this->path));

        // アップロード（submit）
        $this->visit('/upload');
        $this->attach(base_path('tests/Http/harinezumi.jpeg'), 'upfile');
        $this->press('Upload');

        // ファイルがあることの検証
        $this->assertTrue($this->file->exists($this->path));

    }
}
