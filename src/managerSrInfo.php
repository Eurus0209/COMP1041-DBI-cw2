<?php
// check sale reps' information
    $date = getDateFromRange($startdate,$now_date);
    $json_date = json_encode($date);
?>
<div class="sr-detail-info-box">
    <table class="table sr-detail-info-table">
        <thead>
            <tr>
            <th scope="col">employeeID</th>
            <th scope="col">Name</th>
            <th scope="col">Realame</th>
            <th scope="col">Region</th>
            <th scope="col">Phone</th>
            <th scope="col">N95 quota</th>
            <th scope="col">surgial quota</th>
            <th scope="col">N95-surgial quota</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo $tStr;
            ?>

        </tbody>
    </table>
</div>
<script >
    <?php
        echo $sStr;
    ?>
</script>