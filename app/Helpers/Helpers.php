<?php

namespace App\Helpers;

/**
 * Class Helpers
 *
 */
class Helpers
{

    /**
     *
     * HT: https://stackoverflow.com/questions/28793614/laravel-5-link-to-with-icon-html
     *
     * @param       $name
     * @param       $html
     * @param array $parameters
     * @param array $attributes
     *
     * @return string
     */
    public static function link_to_route_html($name, $html, $parameters = array(), $attributes = array())
    {
        $url = route($name, $parameters);
        return '<a href="' . $url . '"' . app('html')->attributes($attributes) . '>' . $html . '</a>';
    }

}
