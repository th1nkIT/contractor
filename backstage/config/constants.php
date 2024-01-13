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
