<?php
/**
 * @author JKetelaar
 */
namespace JKetelaar\Updown;

use JKetelaar\Updown\Call\AbstractCall;
use JKetelaar\Updown\Call\ListCall;
use JKetelaar\Updown\Exception;

class UpdownApi {

    public static $types  = [ 'GET', 'POST' ];

    const ENDPOINT = 'https://updown.io/api/checks';

    /**
     * @var string
     */
    private $api_key = '';

    /**
     * @var bool
     */
    private $readonly;

    /**
     * @var AbstractCall[]
     */
    private $calls;

    /**
     * UpdownApi constructor.
     *
     * @param string  $api_key
     * @param boolean $readonly
     */
    public function __construct($api_key, $readonly = false) {
        $this->api_key  = $api_key;
        $this->readonly = $readonly;

        $this->fillCalls();
    }

    private function fillCalls(){
        $this->calls['list'] = new ListCall();
    }

    public function performCall(AbstractCall $call) {
        $query = self::ENDPOINT . ($call->getQuery() == null ? : '?' . $call->getQuery()) . $this->api_key;
    }

    /**
     * @param string $call
     *
     * @return AbstractCall
     */
    public function getCall($call){
        return $this->calls[$call];
    }

    /**
     * @return Call\AbstractCall[]
     */
    public function getCalls() {
        return $this->calls;
    }

    public function addCall(AbstractCall $call){
        $this->calls[$call->getKey()] = $call;
    }
}