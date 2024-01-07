<?php

// Total Article
function getTotalArticle()
{
    global $koneksi;

    $query = "SELECT COUNT(id) AS total FROM articles";
    $stmt = $koneksi->prepare($query);

    if ($stmt) {
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($total);
        $stmt->fetch();

        $stmt->close();

        return $total;
    } else {
        return -1;
    }
}

// Total Category
function getTotalCategory()
{
    global $koneksi;

    $query = "SELECT COUNT(id) AS total FROM category";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($total);
        $stmt->fetch();

        $stmt->close();

        return $total;
    } else {
        return -1;
    }
}

// Total Project
function getTotalProject()
{
    global $koneksi;

    $query = "SELECT COUNT(id) AS total FROM projects";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($total);
        $stmt->fetch();

        $stmt->close();

        return $total;
    } else {
        return -1;
    }
}

// Total Client
function getTotalClient()
{
    global $koneksi;

    $query = "SELECT COUNT(id) AS total FROM client";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($total);
        $stmt->fetch();

        $stmt->close();

        return $total;
    } else {
        return -1;
    }
}
