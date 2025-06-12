<?php

// Counting 3 days without counting Saturday and Sunday
if (!function_exists('add_working_days')) {
    function add_working_days($date, $workingDays = 3)
    {
        $currentDate = new DateTime($date); // Convert input date to DateTime object
        $daysAdded = 0;

        // Loop until we add the required number of working days
        while ($daysAdded < $workingDays) {
            $currentDate->modify('+1 day'); // Move to the next day
            // Check if it's a weekend (Saturday or Sunday)
            if ($currentDate->format('N') < 6) {
                // Only count Monday to Friday
                $daysAdded++;
            }
        }

        // Return the calculated date in the desired format: '06 February 2025, at 08:14 AM'
        return $currentDate->format('d F Y, \a\t h:i A');
    }
}
