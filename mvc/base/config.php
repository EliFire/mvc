<?php

const DB_USER = 'root';
const DB_NAME = 'mvc';
const DB_HOST = 'localhost';
const DB_PASSWORD = 'root';

const ADMIN_IDS = [1];

function d(...$args)//функция для дебага
{
    var_dump($args);
    die;
}