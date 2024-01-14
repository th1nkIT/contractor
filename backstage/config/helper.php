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

    $query = "SELECT COUNT(uuid) AS total FROM client";
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

// Latest Project
function getLatestProject()
{
    global $koneksi;

    $query = "SELECT * FROM projects LEFT JOIN client ON projects.client_id = client.uuid ORDER BY projects.id DESC LIMIT 5";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    } else {
        return -1;
    }
}

// Latest Article
function getLatestArticle()
{
    global $koneksi;

    $query = "SELECT * FROM articles ORDER BY id DESC LIMIT 5";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    } else {
        return -1;
    }
}

// Top Count Client
function topClient()
{
    global $koneksi;

    $query = "SELECT client.client_name, client.client_email, client.client_images, COUNT(projects.client_id) AS total FROM projects LEFT JOIN client ON projects.client_id = client.uuid GROUP BY projects.client_id ORDER BY total DESC LIMIT 5";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    } else {
        return -1;
    }
}

// Get Setting
function getSetting()
{
    global $koneksi;

    $query = "SELECT * FROM settings";
    $stmt = $koneksi->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    } else {
        return -1;
    }
}
