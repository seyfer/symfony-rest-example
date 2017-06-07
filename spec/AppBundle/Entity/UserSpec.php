<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\User;
use AppBundle\Model\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
        $this->shouldImplement(UserInterface::class);
    }
}
