<?php

namespace Strawberry\Template;

class TemplateParser {

    public static function generate(array $data, string $tmp)
    {
        return Self::parse($data, $tmp);
    }

    private static function parse(array $data, string $tmp)
    {
        $doExist = true;
        while ($doExist) {
            preg_match('#\:::(.*?)\:::#', $tmp, $res);
            if (!isset($res[1])) {
                $doExist = false;
                break;
            }
            $tmp = Self::release($data, $tmp, $res);
        }
        return $tmp;
    }

    private static function release(array $data, string $tmp, array $res): string
    {
        return str_replace($res[0], $data[$res[1]] ?? " ", $tmp);
    }

}
