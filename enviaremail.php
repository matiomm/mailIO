<?php
date_default_timezone_set('America/Santiago');

$rut = $_POST["rut"];
$enunciado = "EX_{$rut}.pdf";

if(is_file($enunciado)){

    $filename = "Registro_EX.csv";
    $header = ["rut","hora"];
    $fyh = date('d/m/Y H:i');
    $data = [$rut,$fyh];

    if(!is_file($filename)){
        $fp = fopen($filename, 'w');
        fputcsv($fp, $header);
    }
    else{
        $fp = fopen($filename, "a");
    }
    fputcsv($fp, $data);
    fclose($fp);

    header("Content-type:application/pdf");
    header("Content-Disposition: inline;filename=Enunciado_EX.pdf");
    readfile($enunciado);

//    header("Content-type: application/pdf");
//    header("Content-Disposition: inline; filename=".$filename);
//    @readfile($filename);
}
else{
    header("Location: home.php?error=1");
}

?>
