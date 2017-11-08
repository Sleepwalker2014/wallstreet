<?php
/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 08.11.17
 * Time: 13:04
 */

namespace php;


class Share {
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $course;

    /**
     * Share constructor.
     *
     * @param string $name
     * @param float  $course
     */
    public function __construct (string $name, float $course) {
        $this->name = $name;
        $this->course = $course;
    }
}