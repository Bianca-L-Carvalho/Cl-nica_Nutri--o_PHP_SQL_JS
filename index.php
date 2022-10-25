<?php

require_once "config.php";

if (
    !empty($_POST["name"]) &&
    !empty($_POST["age"]) &&
    !empty($_POST["height"]) &&
    !empty($_POST["weight"])
) {

    $query = "INSERT INTO nutrition (name, age, height, weight) VALUES ( ?, ?, ?, ?)";

    $sql = $pdo->prepare($query);

    if ($sql->execute([
        $_POST["name"],
        $_POST["age"],
        $_POST["height"],
        $_POST["weight"]
    ])) {
        $patients = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $patients = [];
    }
}


require_once "head.php";


?>

<div>
    <section>
        <form method="POST" action="index.php">
            <div class="form">
                <div>
                    <label for="name">
                        <input type="text" name="name" placeholder="Nome">
                    </label>
                </div>
                <div>
                    <label for="age">
                        <input type="number" name="age" placeholder="Idade">
                    </label>
                </div>
                <div>
                    <label for="height">
                        <input type="number" step=".01" name="height" placeholder="Altura(m)">
                    </label>
                </div>
                <div>
                    <label for="weight">
                        <input type="number" step=".01" name="weight" placeholder="Peso(kg)">
                    </label>
                </div>
                <div>
                    <button>Cadastrar</button>
                </div>
            </div>
        </form>
    </section>

</div>

<?php
require_once "foot.php";
?>