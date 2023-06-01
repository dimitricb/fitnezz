<!DOCTYPE html>

<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";
include "../pages/header.php";


$programtypes = ProgramType::vratiSve($conn);


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
        width: 1000px;
        height: 500px;


    }


    .form-group {
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        width: 700px;
        height: 100px;


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

<script>
    function find() {

        var pretraga = $("#programtype").val();
        $.ajax({
            url: "../serverpretraga.php",
            data: "programtypeid=" + pretraga,
            success: function(result) {
                $('#output').html(result);
            },

        });

    }
</script>


<div class="forma">
    <div id="find-form" class="row form-container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="programtype">Program type:</label>
                    <div class="d-flex">
                        <select class="form-control" name="programtype" id="programtype">
                            <?php foreach ($programtypes as $pt) : ?>
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
</div>


</body>


</html>