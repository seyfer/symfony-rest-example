<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 6/5/17
 */

namespace AppBundle\Features\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class UserSetupContext implements Context, SnippetAcceptingContext
{
    /**
     * @var UserManagerInterface
     */
    private $userManager;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * UserSetupContext constructor.
     * @param UserManagerInterface $userManager
     * @param EntityManagerInterface $em
     */
    public function __construct(UserManagerInterface $userManager, EntityManagerInterface $em)
    {
        $this->userManager = $userManager;
        $this->em          = $em;
    }

    /**
     * @Given there are Users with the following details:
     * @param TableNode $users
     */
    public function thereAreUsersWithTheFollowingDetails(TableNode $users)
    {
        dump("thereAreUsersWithTheFollowingDetails", $users); exit;
    }
}