<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexPageTest extends TestCase
{
    /** @test */
    public function index_page_contains_meta_and_og_tags()
    {
        $this->visit('/')
            ->see('meta name="keywords"')
            ->see('meta name="description"')
            ->see('meta property="og:title"')
            ->see('meta property="og:description"')
            ->see('meta property="og:image"');
    }
}
