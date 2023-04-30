<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";
include "../pages/header.php";


$programtype = ProgramType::vratiSve($conn);

if (isset($_POST['dodaj'])) {

    $program_name = trim($_POST['program_name']);
    $duration = trim($_POST['duration']);
    $date = trim($_POST['date']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $programtype = $_POST['programtype'];



    $data = array(
        "program_name" => $program_name,
        "duration" => $duration,
        "date" => $date,
        "price" => $price,
        "description" => $description,
        "programtypeid" => $programtype,
    );

    $program = new Program(null, $program_name, $duration, $date, $price, $description, $programtype);

    $program->insertProgram($data, $conn);

    $program = $program->getPoruka();
    header("Location:unosnovogprograma.php");
}
?>

<!-- <style>
    .forma {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }
</style> -->

<div class="container">
    <div class=" row form-container ">


        <form name="unosPrograma" action="" onsubmit="return validateForm()" method="POST" role="form">
            <div class="form-group">
                <label for="program_name">Program name:</label>
                <input type="text" class="form-control" name="program_name" id="program_name" placeholder="Insert program name">
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" class="form-control" name="duration" id="duration" placeholder="Insert duration">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="date" id="date" placeholder="Insert date">

            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Insert price">

            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Insert description">

            </div>

            <div class="form-group">
                <label for="programtype">Program type:</label>

                <select class="form-control" name="programtype" id="programtype">
                    <?php foreach ($programtype as $pt) : ?>
                        <option value="<?php echo $pt->programtypeid; ?>">
                            <?php echo $pt->programtypename; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group">
                <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Add</button>
            </div>
        </form>

    </div>
</div>
</body>

</html>