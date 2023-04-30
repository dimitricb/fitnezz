<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";

$programid = $_GET['programid'];

$program = Program::vratiSve($conn, " where p.programid=" . $programid);
$programtype = ProgramType::vratiSve($conn);
$poruka = '';

if (isset($_POST['update'])) {
    $program_name = $_POST['program_name'];
    $duration = $_POST['duration'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $programtype = $_POST['programtype'];

    $conn->query("UPDATE program SET program_name='$program_name', duration='$duration', date='$date', price='$price', description='$description',programtypeid='$programtype' WHERE programid=$programid");
    header('location: sviprogrami.php');
}
?>



<div class="row">
    <div id="uni-logos-wrapper" class="col-12">
    </div>
</div>
<div id="insert-form" class="row form-container">
    <div class="col-md-2"></div>
    <div id="teatar-bg-img" class="col-md-4"></div>
    <div class="col-md-4">

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
    <div class="col-md-2"></div>
</div>
</body>

</html>