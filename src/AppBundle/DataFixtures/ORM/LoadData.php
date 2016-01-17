<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadStudentData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = \Nelmio\Alice\Fixtures::load(__DIR__.'/fixtures.yml', $manager, ['providers' => [$this]]);
    }

}