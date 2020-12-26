<?php

namespace Tests\Unit;

use App\Models\News;
use PHPUnit\Framework\TestCase;

class MPostsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $model = new News();
        $data = $model->getById(2);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }
}
