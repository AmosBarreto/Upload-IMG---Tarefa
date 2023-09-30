<!DOCTYPE html>
<html>
<head>
    <title>Upload de Imagem</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $upload_dir = "uploads/";

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    if (isset($_FILES["imagem"])) {
        $imagem = $_FILES["imagem"];
        $imagem_nome = $imagem["name"];
        $imagem_tmp = $imagem["tmp_name"];
        $imagem_destino = $upload_dir . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_destino);

       
        echo '<h3>Imagem Enviada:</h3>';
        echo '<img src="' . $imagem_destino . '" alt="Imagem Enviada">';
    }

    if (isset($_FILES["pdf"])) {
        $pdf = $_FILES["pdf"];
        $pdf_nome = $pdf["name"];
        $pdf_tmp = $pdf["tmp_name"];
        $pdf_destino = $upload_dir . $pdf_nome;
        move_uploaded_file($pdf_tmp, $pdf_destino);

       
        echo '<h3>PDF Enviado:</h3>';
        echo '<a href="' . $pdf_destino . '" target="_blank">Link para PDF</a>';
    }
}
?>
    <h2>Upload de Imagem</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="imagem" accept=".jpg, .jpeg, .png, .bmp">
        <input type="submit" value="Enviar Imagem">
    </form>
    <h2>Upload de PDF</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="pdf" accept=".pdf">
        <input type="submit" value="Enviar PDF">
    </form>
</body>
</html>