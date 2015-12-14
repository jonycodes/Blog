<?php
/*
Linked List designed to store comments loaded from the data base
Comments feature is turned Off

 */

/*

class linklist {
private $link;
private $data = "";

function __construct() {

}

private function setLink($link) {
$this->link = $link;
}

private function getLink() {
return $this->link;
}

private function setData($data) {
$this->data = $data;
}

public function getData() {
return $data;
}

public function insert($data) {
$link = new linklist();
$link->setData($data);
$link->setLink($this->getLink());

}

}
