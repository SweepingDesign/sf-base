<?php

namespace Sd\BaseBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */

class Address {

    /** @MongoDB\String */
    protected $name;

    /** @MongoDB\String */
    protected $address;

    /** @MongoDB\String */
    protected $address2;

    /** @MongoDB\String */
    protected $city;

    /** @MongoDB\String */
    protected $state;

    /** @MongoDB\String */
    protected $zip;

    public function __toString()
    {
        return $this->format();
    }

    public function format()
    {
        $address = $this->getAddress() . " " . $this->getAddress2() . " " . $this->getCity() . ", " . $this->getState() . " " . $this->getZip();
        return $address;
    }

    public function isComplete()
    {
        return $this->address && $this->city && $this->zip;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getState()
    {
        return 'WI'; // $this->state;
    }

    public function setZip($zip) {
        $this->zip = $zip;
    }

    public function getZip()
    {
        return $this->zip;
    }

}