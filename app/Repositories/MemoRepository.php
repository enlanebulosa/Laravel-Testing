<?php

namespace App\Repositories;

use App\Repositories\MemoRepositoryInterface;
use App\Memo;

class MemoRepository implements MemoRepositoryInterface
{
    protected $memo;

    /**
     * MemoRepository constructor.
     * @param Memo $memo
     */
    public function __construct(Memo $memo)
    {
        $this->memo = $memo;
    }

    public function getAll()
    {
        return $this->memo->all();
    }

    public function create($text)
    {
        $this->memo->create(['text' => $text]);
    }
}