<?php

use Mockery as m;
use RyanNielson\Shareable\Buttons\GooglePlus;

class ButtonsGooglePlusTest extends \PHPUnit\Framework\TestCase {

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
        $googlePlus = new GooglePlus($this->view);
        $this->assertTrue(method_exists($googlePlus, 'render'),  'Class does not have method render');
    }
}
