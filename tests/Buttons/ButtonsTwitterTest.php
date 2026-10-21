<?php

use Mockery as m;
use RyanNielson\Shareable\Buttons\Twitter;

class ButtonsTwitterTest extends \PHPUnit\Framework\TestCase {

    public function setUp(): void
    {
        $this->view = m::mock('Illuminate\View\Factory');
    }

    public function tearDown(): void
    {
        m::close();
    }

    public function testRenderExists()
    {
        $twitter = new Twitter($this->view);
        $this->assertTrue(method_exists($twitter, 'render'),  'Class does not have method render');
    }
}
