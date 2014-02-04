<?php

class Test01 {
    public function __construct() {
        throw new TestException01('Exception from '.__METHOD__);
    }
}