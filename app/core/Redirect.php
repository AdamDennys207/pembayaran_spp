<?php
class Redirect
{
    static function to($url)
    {
        return header('Location: ' . BASEURL . '/' . $url);
        exit;
    }
}