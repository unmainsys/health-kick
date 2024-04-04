<?php

namespace Unmainsys\HealthKick\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Browser\Test\HasBrowser;

class MercureControllerTest extends KernelTestCase
{
    use HasBrowser;

    public function testSubscribedAction(): void
    {
        $this->browser()
            ->visit('/subscribed')
            ->assertSuccessful()
            ->assertContains('EventSource')
        ;
    }
}