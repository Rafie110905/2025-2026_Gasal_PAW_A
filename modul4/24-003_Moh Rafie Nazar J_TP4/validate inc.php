<?php
function validateName($field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        return false;
    else if (!preg_match($pattern, $field_list[$field_name]))
        return false;
    return true;
}
?>