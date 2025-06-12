<?php

use App\Models\QvcUniversityModel;

if (!function_exists('get_university_name')) {
    function get_university_name($qu_id)
    {
        $university_model = new QvcUniversityModel();
        $university_name =  $university_model->select('qu_name')->where('qu_id', $qu_id)->first();

        return $university_name ? $university_name->qu_name : 'Unknown University'; // Return name or default value
    }
}
