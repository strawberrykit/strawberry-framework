<?php

namespace Strawberry\Template;

class TemplateController {

    const PATH = '/app/templates/';

    public static function getPageBoilerPlate(){
        return $GLOBALS['directory'].Self::PATH.'page-boiler.html';
    }

    

}
