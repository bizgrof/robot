<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 3.12
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://opensource.org/licenses/GPL-3.0 GPLv3
  *   @license http://opensource.org/licenses/LGPL-3.0 LGPLv3
  *      @link http://kcfinder.sunhater.com
  */

/* IMPORTANT!!! Do not comment or remove uncommented settings in this file
   even if you are using session configuration.
   See http://kcfinder.sunhater.com/install for setting descriptions */

$_CONFIG = array(


// GENERAL SETTINGS

    'disabled' => false,
    'uploadURL' => "../upload",
    'uploadDir' => "",
    'theme' => "default",

    'types' => array(

    // (F)CKEditor types
        'flash'   =>  "swf",
        'images'  =>  "*img",
        'docs' => "pdf doc docx xls xlsx",
        'product_images' => "*img",
        'files'   =>  "",


        // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "*img",
    ),


// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => "thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat cgi pl php phps phtml php3 php4 php5 php6 py pyc pyo pcgi pcgi3 pcgi4 pcgi5 pchi6",


// MISC SETTINGS

    'filenameChangeChars' => array(
        ' ' => "_",
        ':' => ".",
        "А" => "A",
        "Б" => "B",
        "В" => "V",
        "Г" => "G",
        "Д" => "D",
        "Е" => "E",
        "Ё" => "E",
        "Ж" => "J",
        "З" => "Z",
        "И" => "I",
        "Й" => "Y",
        "К" => "K",
        "Л" => "L",
        "М" => "M",
        "Н" => "N",
        "О" => "O",
        "П" => "P",
        "Р" => "R",
        "С" => "S",
        "Т" => "T",
        "У" => "U",
        "Ф" => "F",
        "Х" => "H",
        "Ц" => "TS",
        "Ч" => "CH",
        "Ш" => "SH",
        "Щ" => "SCH",
        "Ъ" => "",
        "Ы" => "YI",
        "Ь" => "",
        "Э" => "E",
        "Ю" => "YU",
        "Я" => "YA",
        "а" => "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "e",
        "ж" => "j",
        "з" => "z",
        "и" => "i",
        "й" => "y",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "h",
        "ц" => "ts",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "sch",
        "ъ" => "y",
        "ы" => "yi",
        "ь" => "",
        "э" => "e",
        "ю" => "yu",
        "я" => "ya",
    ),

    'dirnameChangeChars' => array(
        ' ' => "_",
        ':' => ".",
        "А" => "A",
        "Б" => "B",
        "В" => "V",
        "Г" => "G",
        "Д" => "D",
        "Е" => "E",
        "Ё" => "E",
        "Ж" => "J",
        "З" => "Z",
        "И" => "I",
        "Й" => "Y",
        "К" => "K",
        "Л" => "L",
        "М" => "M",
        "Н" => "N",
        "О" => "O",
        "П" => "P",
        "Р" => "R",
        "С" => "S",
        "Т" => "T",
        "У" => "U",
        "Ф" => "F",
        "Х" => "H",
        "Ц" => "TS",
        "Ч" => "CH",
        "Ш" => "SH",
        "Щ" => "SCH",
        "Ъ" => "",
        "Ы" => "YI",
        "Ь" => "",
        "Э" => "E",
        "Ю" => "YU",
        "Я" => "YA",
        "а" => "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "е" => "e",
        "ё" => "e",
        "ж" => "j",
        "з" => "z",
        "и" => "i",
        "й" => "y",
        "к" => "k",
        "л" => "l",
        "м" => "m",
        "н" => "n",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "у" => "u",
        "ф" => "f",
        "х" => "h",
        "ц" => "ts",
        "ч" => "ch",
        "ш" => "sh",
        "щ" => "sch",
        "ъ" => "y",
        "ы" => "yi",
        "ь" => "",
        "э" => "e",
        "ю" => "yu",
        "я" => "ya",
    ),

    'mime_magic' => "",

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_normalizeFilenames' => false,
    '_check4htaccess' => true,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => "KCFINDER",
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",
    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",

    //'_cssMinCmd' => "java -jar /path/to/yuicompressor.jar --type css {file}",
    //'_jsMinCmd' => "java -jar /path/to/yuicompressor.jar --type js {file}",

);

?>