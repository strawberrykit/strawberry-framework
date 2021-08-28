<?php

namespace Strawberry;
use \Strawberry\CliPrinter as Printer;
use \Strawberry\CliRegistry as Registry;

class App
{
    public function runCommand(array $input)
    {
        if (isset($input[1])) {
            CliPrinter::message(Registry::find($input));
            return;
        }
        echo CliPrinter::message("Please enter a command. For help, type ./strawberry help");
    }
}
