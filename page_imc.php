<?php
require_once "config.php";

$query = "SELECT * FROM imc_patients_desc";
$sql = $pdo->prepare($query);
if ($sql->execute()) {
    $patientsIMC = $sql->fetchAll(PDO::FETCH_ASSOC); 
} else {
    $patientsIMC = [];
}


require_once "head.php";

?>


    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>IMC</th>
            <th>Classificação</th>
        </tr>
        <?php foreach ($patientsIMC as $patientIMC) : 
            $patientID = $patientIMC["id"];
            $patientName = $patientIMC["name"];
            $patientIMCValue = $patientIMC["imc"];

            if ($patientIMCValue < 18.5 ) {
                $patientClass = " Baixo Peso"; 
                $bg_color = "bp-color" ;
            } else if ($patientIMCValue >= 18.5 && $patientIMCValue <= 24.9) {
                $patientClass = " Peso Normal";
                $bg_color = "np-color";
            } else if ($patientIMCValue >= 25 && $patientIMCValue <= 29.9) {
                $patientClass = " Sobrepeso";
                $bg_color = "sp-clor";
            } else if ($patientIMCValue >= 30 && $patientIMCValue <= 34.9) {
                $patientClass = " Obesidade Grau I";
                $bg_color = "ob1-color";
            } else if ($patientIMCValue >= 35 && $patientIMCValue <= 39.9) {
                $patientClass = " Obesidade Grau II";
                $bg_color = "ob2-color";
            } else {
                $patientClass = " Obesidade Grau III ou Mórbida";
                $bg_color = "ob3-color";
            }
            ?>
            <tr class="<?php echo $bg_color?>">
                <td><?php echo $patientID ?></td>
                <td><?php echo $patientName?></td>
                <td><?php echo round($patientIMCValue,1) ?></td>
                <td><?php echo $patientClass?></td>
            </tr>
        <?php endforeach; ?> 
    </table>

<?php
require_once "foot.php";
?>