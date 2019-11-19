<?php

/**
 * This class is for storing the website information.
 * Updates to this file will affect all pages.
 */

class GetWebsiteInfo {
    public static $title = '4rum'; // SITE NAME (shown in tabs, search engines etc.)

    // Constructor values
    public $cssPath;
    public $jsPath;

    // Construct a file path for loading website scripts and assets
    public function __construct($type, $filename){

        if($type == 'css'){
            $this->cssPath = 'css/' . $filename . '.css';
        }

        if($type == 'js'){
            $this->jsPath = 'js/' . $filename . '.js';
        }
    }
}