<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";
include "../pages/header.php";


$programid = $_GET['programid'];

$program = Program::vratiSve($conn, " where p.programID=" . $programid);
$programtype = ProgramType::vratiSve($conn);


if (isset($_POST['update'])) {
    $program_name = $_POST['program_name'];
    $duration = $_POST['duration'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $programtype = $_POST['programtype'];


    $conn->query("UPDATE program SET program_name='$program_name', duration='$duration', date='$date', price='$price', description='$description', programtypeid='$programtype' WHERE programID=$programid");

    header('Location: sviprogrami.php');
}
?>

<style>
    .forma {
        margin: 0;
        height: 100%;
        padding: 15px;
        padding-top: 150px;
        padding-left: 100px;
        width: 100%;
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        font-family: sans-serif;
        font-weight: 250;
        font-size: medium;

    }

    .form-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;


    }


    .form-group {
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        margin-top: 0;
        margin-bottom: 0;


    }


    .form-control {
        font-size: medium;
        font-weight: 200;
    }

    .btn-round-custom {
        background-color: #ea4c89;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #ffffff;
        cursor: pointer;
        display: inline-block;
        font-size: 18px;
        text-align: center;
        touch-action: manipulation;
        height: 50px;
        width: 170px;




    }
</style>

<div class="forma">
    <div id="insert-form" class="row form-container">
        <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
            <div class="form-group">
                <label for="Program name">Program name:</label>
                <input type="text" class="form-control" name="program_name" id="program_name" value="<?php echo $program[0]->program_name; ?>">
            </div>
            <div class="form-group">
                <label for="Duration">Duration:</label>
                <input type="text" class="form-control" name="duration" id="duration" value="<?php echo $program[0]->duration; ?>">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="date" id="date" value="<?php echo $program[0]->date; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" id="price" value="<?php echo $program[0]->price; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" value="<?php echo $program[0]->description; ?>">
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
                <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
            </div>
        </form>

    </div>
</div>
</body>

</html>