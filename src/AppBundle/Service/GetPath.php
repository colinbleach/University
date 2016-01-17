<?php

namespace AppBundle\Service;

class GetPath
{
    protected $completed;

    public function __construct()
    {
        $this->completed = array();
    }

    public function getPath($student)
    {
        $name = strtolower(str_replace(' ', '_', $student->getName()));
        $name = preg_replace('/[^A-Za-z0-9\-]/', '_', $name);

        if (array_key_exists($name, $this->completed)) {
            $this->completed[$name]++;
            $name = $name . '_' . $this->completed[$name];
        } else {
            $this->completed[$name] = 0;
        }

        return $name;
    }
}