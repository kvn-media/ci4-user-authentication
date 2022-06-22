<?php

    /**
     * Displaying Error to form after validation.
     */
    function display_form_error($validation, $field)
    {
        if($validation->hasError($field))
        {
            return $validation->getError($field);
        }
    }