<?php

namespace Strawberry;

class CliPrinter
{
    private static function out($message)
    {
        echo $message;
    }

    private static function newline()
    {
        Self::out("\n");
    }

    public static function message($message)
    {
        Self::newline();
        Self::out($message);
        Self::newline();
        Self::newline();
    }
}
