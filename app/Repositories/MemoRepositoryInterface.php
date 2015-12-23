<?php

namespace App\Repositories;


/**
 * Interface MemoRepositoryInterface
 * @package App\Repositories
 */
interface MemoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $text
     * @return mixed
     */
    public function create($text);
}