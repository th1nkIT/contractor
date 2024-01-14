<?php

function infoComponents()
{
    global $koneksi;
    // Settings
    $stmt_settings = $koneksi->prepare("SELECT * FROM settings");
    $stmt_settings->execute();
    $settings = $stmt_settings->get_result();
    $stmt_settings->close();

    echo '
    <!-- Info Start -->
        <section class="info">';

    while ($pecah_settings = $settings->fetch_assoc()) {
        echo '
            <div class="konten-info">
                <li class="fa fa-' . $pecah_settings['fa_icon'] . ' fa-3x"></li>
                <p><b>' . $pecah_settings['title'] . '</b></p>
                <p>' . $pecah_settings['keterangan'] . '</p>
            </div>';
    }

    echo '
        </section>
    <!-- Info End -->';
}
