<?php
namespace Model;
use \GuzzleHttp\Client as GuzzleHttp;
abstract class Model
{
    private $request;
    function __construct() {
        $this->request = new GuzzleHttp();
    }
    public function get() {
        $res = $this->request->request('GET', $this->url);
        return json_decode($res->getBody()->getContents());
    }
}