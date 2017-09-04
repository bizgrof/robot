<?php

function dot_split($str){
    return explode('.',$str);
}

function price($price){
    return number_format($price,0,'',' ');
}