<?php

function StatusProject(int $status)
{
    switch ($status) {
        case 1:
            return "Active";
        case 2:
            return "Done";
        case 3:
            return "Soon";
        default:
            return "Unknown";
    }
}

function ProjectDate($date)
{
    $formattedDate = date('d-m-Y', strtotime($date));

    if ($formattedDate == "01-01-1970" || $formattedDate == "00-00-0000")
        return "On Progress";

    return $formattedDate;
}
