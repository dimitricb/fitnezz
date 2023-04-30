<!DOCTYPE html>

<?php
include "../dbBroker.php";
include "../model/programtype.php";
include "../model/program.php";
include "../pages/header.php";

$order = '';



$programs = Program::vratiSve($conn, $order);

?>





<div class="row">
    <div id="uni-logos-wrapper" class="col-12">
    </div>
</div>
<div id="find-form" class="row form-container">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="table-responsive" id="tabela-program">
            <table class="table">
                <thead>
                    <tr>
                        <th><a class="column_sort" id="program_name" data-order="desc" href="#">Program name</a></th>
                        <th><a class="column_sort" id="duration" data-order="desc" href="#">Duration</a></th>
                        <th><a class="column_sort" id="date" data-order="desc" href="#">Date</a></th>
                        <th><a class="column_sort" id="price" data-order="desc" href="#">Price</a></th>
                        <th><a class="column_sort" id="description" data-order="desc" href="#">Description</a></th>
                        <th>Program type</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($programs as $program) :
                    ?>
                        <tr>
                            <td><?php echo $program->program_name; ?></td>
                            <td><?php echo $program->duration; ?></td>
                            <td><?php echo $program->date; ?></td>
                            <td><?php echo $program->price; ?></td>
                            <td><?php echo $program->description; ?></td>
                            <td><?php echo $program->programtype->programtypename; ?></td>
                            <td><a href="brisanjeprograma.php?programid=<?php echo $program->programid; ?>">
                                    <img class="icon-images" src="img/trash.png" width="20px" height="20px" />
                                </a>
                                <a href="izmenaprograma.php?programid=<?php echo $program->programid; ?>">
                                    <img class="icon-images" src="img/refresh.png" width="20px" height="20px" />
                                </a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <div id="output">

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-2"></div>
</div>

</body>


</html>
<script>
    $(document).ready(function() {
        $(document).on('click', '.column_sort', function() {
            var column_name = $(this).attr("id");
            var order = $(this).data("order");
            var arrow = '';
            //glyphicon glyphicon-arrow-up  
            //glyphicon glyphicon-arrow-down  
            if (order == 'desc') {
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
            } else {
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
            }
            $.ajax({
                url: "serversort.php",
                method: "POST",
                data: {
                    column_name: column_name,
                    order: order
                },
                success: function(data) {
                    $('#tabela-program').html(data);
                    $('#' + column_name + '').append(arrow);
                }
            })
        });
    });
</script>