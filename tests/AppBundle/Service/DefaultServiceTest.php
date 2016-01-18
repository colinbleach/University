<?php

namespace Tests\AppBundle\Service;
use AppBundle\Entity\Student;

use AppBundle\Service\GetPath;
use PHPUnit_Framework_MockObject_MockObject;

class DefaultServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider studentData
     */
    public function testPath($name, $expectedName)
    {
        $student = new Student();
        $student->setName($name);
        $student->setDescription('');
        $student->setPath('');

        $service = new GetPath();

        $returnedResult = $service->getPath($student);

        $this->assertEquals($expectedName,$returnedResult);
    }

    public function studentData()
    {
        return array(
            ['colin bleach','colin_bleach'],
            ['Colin bleach','colin_bleach'],
            ['colin bl?each','colin_bl_each'],

        );
    }

}
