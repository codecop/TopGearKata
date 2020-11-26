<?php
/**
 * CodingAssignments Refactoring: GearBox
 *
 * This is a refactoring challenge where the candidate can look at a single-method
 * case, where the method is untested, needs refactoring, and is hard to read. Oh,
 * and contains bugs;-)
 *
 * The assignment is as follows:
 *
 * This is the code for our customer's new environmentally friendly electric car.
 * The car is very dependent on software for almost everything, and the part that we're
 * working on is the automatic gear box. The code you see is the automatic gear box, which
 * currently shifts up if the engine goes over 2000 rpm, and down if it goes under 500.
 *
 * For our this new car, it's been determined that the choice of gear can be much
 * more efficient if we could just set more specific ranges of rpm for each gear.
 * Future versions of the car could then use actual measurements of fuel consumption
 * to configure those ranges on the fly!
 * Your assignment is to make the gearbox accept a range of rpms for each gear (and
 * of course use that range to shift gears!)
 */
class GearBox
{
    public $gear = 0;

    public function __construct()
    {
        $this->ranges = [
            0 => [0, -PHP_INT_MAX],
            1 => [2000, -PHP_INT_MAX],
            2 => [2000, 500],
            3 => [2000, 500],
            4 => [2000, 500],
            5 => [2000, 500],
            6 => [PHP_INT_MAX, 500],
        ];
    }

    public function doIt($rpm)
    {
        if ($this->gear < 0) {
            // do nothing!
            return;
        }

        if ($rpm > $this->ranges[$this->gear][0]) {
            $this->gear++;
        } else if ($rpm < $this->ranges[$this->gear][1]) {
            $this->gear--;
        }

    }
}
