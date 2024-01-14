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

function RoleBackstage(int $role)
{
    switch ($role) {
        case 1:
            return "Administrator";
        case 2:
            return "User";
        default:
            return "Unknown";
    }
}
