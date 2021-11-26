<?php
function randomString()
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),10,10);
}