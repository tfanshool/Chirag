<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/css/uikit.min.css" />
    <title>Detail Bookings Page</title>
    <?php
        include "db.php";
        $id=$_GET['booking_id'];
        $stmt = $dbh->query("SELECT * FROM bookings where id='$id'");
        $row = $stmt->fetch(PDO::FETCH_NUM);

    ?>
</head>
<body>
<div class=" uk-container uk-container-large uk-margin-large-top">
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container">
            <img src="images/<?php echo $row["4"]; ?>" alt="" uk-cover>
            <canvas width="600" height="400"></canvas>
        </div>
        <div>
            <div class="uk-card-body">
                <h1 class="uk-heading-xlarge"><?php echo $row["2"]; ?></h1>
                <p><span class="">Date Created : </span><span class="uk-text-bold"><?php echo date('d/m/y h:m:i', strtotime($row["1"])) ; ?></span> </p>
                <p><span>Total Amount : </span><span class="uk-text-bold uk-text-emphasis uk-text-large uk-text-primary"><?php echo "Rs. ",$row["3"]; ?></span></p>
                <p><span>Avatar Name  : </span><span class="uk-text-bold"><?php echo $row["4"]; ?></span></p>
                <p><div uk-margin class="">
                    <button class="uk-button uk-button-primary uk-button-smal">Add Log</button>
                </div></p>
            </div>
        </div>
    </div>

    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
            <tr>
                <th class="uk-table-shrink"></th>
                <th class="uk-table-shrink">Log ID</th>
                <th class="uk-table-shrink">Date</th>
                <th class="uk-table-shrink">Time</th>
                <th class="uk-table-expand">Log Name</th>
                <th class="uk-table-small">Log Status</th>
                <th class="uk-table-shrink uk-text-nowrap">Amount</th>
                <th class="uk-table-shrink">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM booking_log where booking_id='$id'";
                $sth = $dbh->query($sql);
                if ($sth->rowCount() > 0) {
                    while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><input class="uk-checkbox" type="checkbox"></td>
                            <td> <?php echo $row["log_Id"]; ?> </td>
                            <td><?php echo date('d/m/y', strtotime($row["log_timestamp"])) ; ?></td>
                            <td><?php echo date('h:m:i', strtotime($row["log_timestamp"])) ; ?></td>

                            <td class="">
                                <a class="uk-link-reset" href=""><?php echo $row["log_name"]; ?></a>
                            </td>
                            <td class="">
                                <span class="uk-label <?php if($row["log_status"]=="due") echo "uk-label-warning"; else echo "uk-label-success"; ?> uk-label-success"><a class="uk-link-reset" ></a><?php echo $row["log_status"]; ?></a></span>
                            </td>
                            <td class="uk-text-nowrap"><?php echo $row["log_amount"]; ?></td>
                            <td>
                                <ul class="uk-iconnav uk-iconnav-vertical uk-flex-middle">

                                    <li><a href="#" uk-icon="icon:  file-text"></a></li>
                                    <li><a href="#" uk-icon="icon:  file-edit"></a></li>
                                    <li><a href="#" uk-icon="icon: trash"></a></li>
                                </ul>
                            </td>
                        </tr>
                        <?php
                    }}
                else{
                    echo "<td  class='uk-align-center'> NO DATA</td>";
                }

            ?>
            </tbody>
        </table>
    </div>



</div>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit-icons.min.js"></script>
</body>
</html>
