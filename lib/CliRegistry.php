<?php

namespace Strawberry;
use \Strawberry\Registry\Create as Create;
use \Strawberry\Builder as Builder;

class CliRegistry
{
    public static function find(array $input){
        switch ($input[1]) {
            case 'create':
                $result = Create::page($input);
                break;

            case 'build':
                $result = Builder::build();
                break;

            default:
                $result = 'Command not found: '.$input[1];
                break;
        }
        return $result;
    }
}
