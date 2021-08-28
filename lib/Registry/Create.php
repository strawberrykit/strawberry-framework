<?php

namespace Strawberry\Registry;
use \Strawberry\Builder as Builder;
use \Strawberry\Template\TemplateController as Template;
use \Strawberry\Template\TemplateParser as Parser;

class Create {

    public static function page(array $input){
        if (!isset($input[2])) {
            return "Error: Requires page path";
        }

        Builder::stage($input[2]);
        return "Page ".$input[2]." has been created.";
    }



}
