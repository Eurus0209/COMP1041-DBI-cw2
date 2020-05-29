<!-- print warning message -->
<div class="warning-box">
    <table class="table warning-table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Sold/Quota</th>
            <th scope="col">Re-grant</th>
            </tr>
        </thead>
        <tbody>
            <?php
                echo $w_str;
            ?>
        </tbody>
    </table>
    <div class="re-grant-box">
    <input type="button" class = "regrant-btn" value="re-grant">
</div>
</div>

