<?php

// Counting 3 days without counting Saturday and Sunday

use App\Models\ExpertiseFieldModel;

if (!function_exists('get_samc_field')) {
    function get_samc_field($field_id)
    {
        $field_model = new ExpertiseFieldModel();
        $field_name =  $field_model->select('ef_desc')->where('ef_id', $field_id)->first();

        return $field_name ? $field_name->ef_desc : 'Unknown Field'; // Return name or default value

    }
}
