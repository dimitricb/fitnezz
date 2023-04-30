<!DOCTYPE html>

<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";
include "../pages/header.php";


$programtype = ProgramType::vratiSve($conn);

?>



<script>
    function find() {

        var pretraga = $("#programtype").val();
        $.ajax({
            url: "server/pretraga.php",
            data: "programtypeid=" + pretraga,
            success: function(result) {
                $('#output').html(result);
            },

        });

    }
</script>


<div class="row">
    <div id="uni-logos-wrapper" class="col-12">
    </div>
</div>
<div id="find-form" class="row form-container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="programtype">Program type:</label>
                <div class="d-flex">
                    <select class="form-control" name="programtype" id="programtype">
                        <?php foreach ($programtype as $pt) : ?>
                            <option value="<?php echo $pt->programtypeid; ?>">
                                <?php echo $pt->programtypename; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="button" id="btn_find" name="pronadji" class="btn-round-custom" onclick="find()">Pronađi</button>
                </div>

            </div>

        </form>
        <div id="output">

        </div>

    </div>
    <div class="col-md-2"></div>
</div>


</body>


</html>