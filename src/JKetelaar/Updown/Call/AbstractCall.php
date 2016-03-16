<?php
/**
 * @author JKetelaar
 */
namespace JKetelaar\Updown\Call;

use JKetelaar\Updown\Exception\UnknownTypeException;
use JKetelaar\Updown\UpdownApi;

abstract class AbstractCall {

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $name;

    /**
     * Defines if the call is compatible with readonly
     *
     * @var boolean
     */
    private $readonly;

    /**
     * @var string
     */
    private $query;

    /**
     * The http type
     * As for now, the API only supports GET and POST
     *
     * @var
     */
    private $type;

    /**
     * AbstractCall constructor.
     *
     * @param string  $key
     * @param string  $name
     * @param boolean $readonly
     * @param string  $query
     * @param string  $type
     *
     * @throws UnknownTypeException
     */
    public function __construct($key, $name, $readonly = true, $query = null, $type = 'GET') {
        $this->key      = $key;
        $this->name     = $name;
        $this->readonly = $readonly;
        $this->query    = $query;
        if(in_array($this->type, UpdownApi::$types)) {
            $this->type = $type;
        } else {
            throw new UnknownTypeException();
        }
    }

    public function getKey() {
        return $this->key;
    }

    public function getName() {
        return $this->name;
    }

    public function getReadonly() {
        return $this->readonly;
    }

    public function getQuery() {
        return $this->query;
    }

    public function getType() {
        return $this->type;
    }
}