<?php
session_start();

$supportLang = ['id', 'en'];
if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    $acceptLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $language = in_array($acceptLang, $supportLang) ? $acceptLang : 'id';
} else {
    $language = 'id';
}

define('ADM_LANG', isset($_SESSION['adm_lang']) ? $_SESSION['adm_lang'] : $language);
define('WEB_LANG', isset($_SESSION['web_lang']) ? $_SESSION['web_lang'] : $language);
