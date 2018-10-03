<?php
namespace Model;

class Dog extends Model
{
    public $url = 'https://random.dog/woof.json';
    function __construct__() {
        parent::__construct__();
    }
}
