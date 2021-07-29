<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/css/uikit.min.css" />
    <title>Bookings Page</title>
    <?php
        include "db.php";
    ?>
</head>
<body>
<div class=" uk-container uk-container-large uk-margin-large-top">
    <div uk-margin class="">
        <button class="uk-button uk-button-primary uk-button-smal">Add Booking</button>
    </div>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
            <tr>
                <th class="uk-table-shrink"></th>
                <th class="uk-table-shrink">ID</th>
                <th class="uk-table-shrink">Date</th>
                <th class="uk-table-shrink">Images</th>
                <th class="uk-table-expand">Bookings Name</th>
                <th class="uk-table-shrink uk-text-nowrap">Amount</th>
                <th class="uk-table-shrink">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM bookings";
                $sth = $dbh->query($sql);
                if ($sth->rowCount() > 0) {
                while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><input class="uk-checkbox" type="checkbox"></td>
                <td> <?php echo $row["id"]; ?> </td>
                <td><?php echo date('d/m/y', strtotime($row["booking_timestamp"])) ; ?></td>
                <td class="uk-flex-middle"><img class="uk-preserve-width uk-border-circle" src="images/<?php echo $row["booking_image"]; ?>" width="50" height="50" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href=""><?php echo $row["booking_name"]; ?></a>
                </td>
                <td class="uk-text-nowrap"><?php echo $row["booking_totalamount"]; ?></td>
                <td>
                    <ul class="uk-iconnav uk-iconnav-vertical uk-flex-middle">

                        <li><a href="detailbooking.php?booking_id=<?php echo $row["id"]; ?>" uk-icon="icon:  file-text"></a></li>
                        <li><a href="#" uk-icon="icon:  file-edit"></a></li>
                        <li><a href="#" uk-icon="icon: trash"></a></li>
                    </ul>
                </td>
            </tr>
            <?php
                }}
                else{
                    echo "<td colspan='6'> NO DATA</td>";
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