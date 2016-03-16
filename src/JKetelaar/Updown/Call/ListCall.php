<?php
/**
 * @author JKetelaar
 */
namespace JKetelaar\Updown\Call;

class ListCall extends AbstractCall {

    /**
     * ListChecks constructor.
     */
    public function __construct() {
        parent::__construct('list', 'Lists all checks', true);
    }
}