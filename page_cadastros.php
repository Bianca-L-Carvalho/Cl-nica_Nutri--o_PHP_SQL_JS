<?php
require_once "config.php";

$query = "SELECT * FROM nutrition";
$sql = $pdo->prepare($query);
if ($sql->execute()) {
    $patients = $sql->fetchAll(PDO::FETCH_ASSOC); 
} else {
    $patients = [];
}


require_once "head.php";

?>


    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Altura</th>
            <th>Peso</th>
        </tr>
        <?php foreach ($patients as $patient) : ?>
            <tr>
                <td><?php echo $patient["id"] ?></td>
                <td><?php echo $patient["name"] ?></td>
                <td><?php echo $patient["age"] ?></td>
                <td><?php echo $patient["height"] ?> kg</td>
                <td><?php echo $patient["weight"] ?> m</td>
            </tr>
        <?php endforeach; ?> 
    </table>

<?php
require_once "foot.php";
?>