<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20-02-2019
 * Time: 11:28 PM
 */function startSession(){
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    }