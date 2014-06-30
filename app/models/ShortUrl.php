<?php
namespace app\models;

use Phalcon\Mvc\Model as Model;

class ShortUrl extends Model {

    protected $id;

    protected $uri;

    protected $short;

    protected $description;

    protected $added;

    protected $lastaccess;

    public function getId() {
        return $this->id;
    }

    public function getUri() {
        return $this->uri;
    }

    public function getShort() {
        return $this->short;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAdded() {
        return $this->added;
    }

    public function getLastAccess() {
        return $this->lastaccess;
    }

    public function setUri($uri) {

        // lets check if 'http(s)://' is present at all..
        preg_match("/(http|https):\/\/(.*?)$/i", $uri, $matches);
        if (count($matches) == 0) {
            $uri = 'http://' . $uri;
        }

        $parsedUrl = parse_url($uri);

        if ($parsedUrl === false || !filter_var($uri, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Uri is not valid. Scheme (http:// etc) is probably missing.');
        }

        $this->uri = $uri;
    }

    public function setShort($short) {
        $this->short = $short;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setAdded($added) {
        $this->added = $added;
    }

    public function setLastAccess($lastaccess) {
        $this->lastaccess = $lastaccess;
    }

    public function initialize() {

        /// TODO Add table relations for 'visited'

        $this->addBehavior(new Model\Behavior\Timestampable(
           [
               'beforeCreate' => [
                   'field' => 'added',
                   'format' => DATE_ATOM
               ],
               'beforeUpdate' => [
                   'field' => 'lastaccess',
                   'format' => DATE_ATOM
               ]
           ]
        ));
    }

}