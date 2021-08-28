<?php

namespace Strawberry;
use \Strawberry\CSSEngine as CSSEngine;
use \Strawberry\Template\TemplateController as Template;
use \Strawberry\Template\TemplateParser as Parser;

class Builder {

    public static function stage ($path){
        $tempPath = explode('/', $path);
        $finalPath = implode('___',$tempPath);
        $buildPage = $GLOBALS['directory'].'/src/'.$finalPath.'.htm';
        file_put_contents($buildPage, '');
    }

    public static function build(){
        $srcPath = $GLOBALS['directory'].'/src';
        $srcs = scandir($srcPath);

        $pageBoilerPlate = file_get_contents(Template::getPageBoilerPlate());

        foreach ($srcs as $src) {
            if ($src==".") {}
            elseif ($src=="..") {}
            elseif ($src=="controllers") {}
            else {
                $srcContent = $srcPath.'/'.$src;
                $collated = CSSEngine::collate(file_get_contents($srcContent));
                $controllerName = Self::convertFileName($src);
                $parsed = Parser::generate(["controller_content"=>$collated,"controller_name"=>$controllerName],$pageBoilerPlate);
                echo $parsed;
            }
        }


        return '';
    }

    private static function convertFileName($resource){
        $keys = explode('___', $resource);
        $bump = [];
        foreach ($keys as $key) {
            $goop = Self::splitFileName($key);
            if (!($goop=='nokey')) {
                array_push($bump, $goop.'Ctrl');
            }
            else {
                array_push($bump, $key);
            }
        }
        return implode('_',$bump);
    }

    private static function splitFileName($filePath){
        $f = explode('.',$filePath);
        if (isset($f[1])) {
            return $f[0];
        }
        return 'nokey';
    }

}
