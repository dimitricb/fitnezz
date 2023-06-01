<?php
include "../dbBroker.php";
include "../pages/header.php";
include "../model/program.php";
include "../model/programtype.php";




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

    header("Location:sviprogrami.php");
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

<style>
    .forma {
        margin: 0;
        height: 100%;
        padding: 40px;
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
        max-width: 500px;
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
        height: 40px;
        width: 100px;




    }
</style>

<div class="forma">
    <div class="row form-container ">


        <form name="unosPrograma" action="" onsubmit="return validateForm()" method="POST" role="form">
            <div class="form-group">
                <label for="program_name">Program name:</label>
                <input type="text" class="form-control" name="program_name" id="program_name" placeholder="Insert program name:">
            </div>
            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" class="form-control" name="duration" id="duration" placeholder="Insert duration(days):">
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="text" class="form-control" name="date" id="date" placeholder="Insert date(yyyy-mm-dd):">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Insert price($):">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Insert description:">
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

<script>
    function validateForm() {
        var program_name = document.forms["unosPrograma"]["program_name"].value;
        var duration = document.forms["unosPrograma"]["duration"].value;
        var date = document.forms["unosPrograma"]["date"].value;
        var price = document.forms["unosPrograma"]["price"].value;
        var description = document.forms["unosPrograma"]["description"].value;
        if (
            program_name == "" ||
            duration == "" ||
            date == "" ||
            price == "" ||
            description == ""
        ) {
            alert("Polja ne smeju biti prazna! ");
            return false;
        }

        if (duration < 30 || duration > 90) {
            alert("Duzina programa ne sme biti manja od mesec dana i veca od 3 meseca! ");
            return false;
        }
        if (price > 300) {
            alert("Cena programa ne sme biti veca od 300$! ");
            return false;
        }
    }
</script>