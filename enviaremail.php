<?php
date_default_timezone_set('America/Santiago');

$rut = $_POST["rut"];
$enunciado = "C3_{$rut}.pdf";

if(is_file($enunciado)){

    $filename = "Registro_C3.csv";
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
    header("Content-Disposition: inline;filename=Enunciado_C3.pdf");
    readfile($enunciado);

//    header("Content-type: application/pdf");
//    header("Content-Disposition: inline; filename=".$filename);
//    @readfile($filename);
}
else{
    header("Location: home.php?error=1");
}

?>
