<?php
date_default_timezone_set('Asia/Jakarta');

if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $tgl = date('j F Y, H:i:s'); // Format tanggal sesuai keinginan (contoh: 31 May 2023, 10:15:30)
    $text = stripslashes(htmlspecialchars($comment));

    $l = rand(1, 2);

    $currentData = file_get_contents("db.html");
    $newData = "<div class='list$l'>
                    <div class='content'>
                        <div class='name'><b>$name</b> | $tgl</div>
                        <div class='comment'>$text</div>
                    </div>
                    <br>
                </div>\n" . $currentData;

    file_put_contents("db.html", $newData);

    echo "Record berhasil disimpan.";
} else {
    echo "Silakan lengkapi semua field.";
}
?>
