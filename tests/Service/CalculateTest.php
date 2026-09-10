<?php

namespace App\Tests\Service;

use App\Service\Calculate;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculateTest extends KernelTestCase {

public function testSum():void {

    self::bootKernel();
    $container = static::getContainer();
    $calculate = $container->get(Calculate::class);

    $correct = $calculate->sum(10, 1);
    $this->assertTrue($correct == 11);

    $inCorrect = $calculate->sum(10, 2);
    $this->assertFalse($inCorrect == 11);

}

}
