<?php

function getUserAvatar() {
    return asset('img/default-avatar.png');;
}

/**
 * Reverse of str_slug
 * @see str_slug()
 * @param $slug
 * @param $separator
 * @return string
 */
function str_unslug($slug, $separator = '-') :string
{
    return title_case(str_replace($separator, ' ', $slug));
}

function array_filter_recursive($array) {
    foreach ($array as $key => &$value) {
        if (empty($value)) {
            unset($array[$key]);
        }
        else {
            if (is_array($value)) {
                $value = array_filter_recursive($value);
                if (empty($value)) {
                    unset($array[$key]);
                }
            }
        }
    }

    return $array;
}

\Collective\Html\FormBuilder::macro('fileBox', function($name, $label, $value = null, $helpText = null)
{
    $html = "<label class='btn btn-default col-md-3'>
                <input name='$name' type='file' hidden class='hidden' /> $label
            </label>";

    if (!is_null($value)) {
        $path = asset($value);
        $html .= "<div class='col-md-9 img-container'><img src='$path' class='img-responsive img-thumbnail' style='max-height: 150px;'/><button class='btn btn-danger btn-xs' onclick='$(this).parent(\".img-container\").find(\"img\").remove();$(this).parent(\".img-container\").find(\"input\").val(\"\");return false;'><i class='glyphicon glyphicon-trash'></i></button><input type='hidden' name='$name' value='$value'></div>";
    }

    if (!is_null($helpText)) {
        $html .= "<p class='help-block col-md-12'>$helpText</p>";
    }

    return '<div class="clearfix"></div>'.$html;
});