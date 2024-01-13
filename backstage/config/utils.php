<?php

function createSlug($title)
{
    $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($title));

    $slug = preg_replace('/-+/', '-', $slug);

    $slug = trim($slug, '-');

    return $slug;
}
