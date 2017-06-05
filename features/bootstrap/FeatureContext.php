<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Tools\SchemaTool;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var SchemaTool
     */
    private $schemaTool;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;

        $this->manager = $doctrine->getManager();

        $this->schemaTool = new SchemaTool($this->manager);

        $this->classes = $this->manager->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @BeforeScenario
     */
    public function createSchema()
    {
        echo '-- DROP SCHEMA -- ' . "\n\n\n";
        $this->schemaTool->dropSchema($this->classes);

        echo '-- CREATE SCHEMA -- ' . "\n\n\n";
        $this->schemaTool->createSchema($this->classes);
    }
}
