<?php

if (! function_exists('agency_user')) {
    function agency_user()
    {
        return auth('agency')->user();
    }
}