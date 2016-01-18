<?php

namespace AppBundle\Command;

use Doctrine\Tests\Common\Collections\ArrayCollectionTest;
use Proxies\__CG__\AppBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Repository\StudentRepository;

class GeneratePathCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('generate:path');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $startTime = microtime(true);
        $batchSize = 1000;

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $repository = $this->getContainer()->get('doctrine')->getRepository('AppBundle:Student');

        $students = $repository->getStudents();

        $i = 0;
        while (($row = $students->next()) !== false)
        {
            $student = $row[0];
            $student->setPath($this->getContainer()->get('get.path')->getPath($student));
            $i++;

            if($i % $batchSize === 0)
            {
                echo memory_get_usage() / 1048576 . 'MB';
                echo("\r\n");
                $em->flush();
                $em->clear();
                gc_collect_cycles();
            }
        }

        $em->flush();

        echo("\r\n");
        $endTime = microtime(true);
        echo($endTime - $startTime);

    }
}