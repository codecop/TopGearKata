<?php

class GearTest extends PHPUnit_Framework_TestCase
{

    public function test_switching()
    {
        $gb = new GearBox();
        // stops at startup
        $this->assertEquals(0, $gb->gear);

        // go up
        $gb->doIt(1);
        $this->assertEquals(1, $gb->gear);

        // not fast enough
        $gb->doIt(2000);
        $this->assertEquals(1, $gb->gear);

        // go all up
        $gb->doIt(2001);
        $gb->doIt(2001);
        $gb->doIt(2001);
        $gb->doIt(2001);
        $gb->doIt(2001);
        $this->assertEquals(6, $gb->gear);

        // max is 6
        $gb->doIt(2001);
        $this->assertEquals(6, $gb->gear);

        // not slow enough
        $gb->doIt(500);
        $this->assertEquals(6, $gb->gear);

        // go down (BUG)
        $gb->doIt(499);
        $this->assertEquals(5, $gb->gear);

        // go all down
        $gb->doIt(499);
        $gb->doIt(499);
        $gb->doIt(499);
        $gb->doIt(499);
        $this->assertEquals(1, $gb->gear);

        // min is 1
        $gb->doIt(499);
        $this->assertEquals(1, $gb->gear);
    }
}
