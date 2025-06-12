<?php

// Counting 3 days without counting Saturday and Sunday
if (!function_exists('get_mqf_level')) {
    function get_mqf_level($mqf_level)
    {
        switch ($mqf_level) {
            case 1:
                return 'Level 1 - Certification';
            case 2:
                return 'Level 2 - Certification';
            case 3:
                return 'Level 3 - Certification';
            case 4:
                return 'Level 4 - Diploma';
            case 5:
                return 'Level 5 - Advanced Diploma';
            case 6:
                return 'Level 6 - Degree';
            case 7:
                return 'Level 7 - Master';
            case 8:
                return 'Level 8 - Doctorate';
            default:
                return 'Invalid MQF Level';
        }
    }
}
