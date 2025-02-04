<?php
ob_start();
?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php'?>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>

<div class="jumbotron">
<div class="col">
        <div class="container">
            <div class="row">
                <h1>Customer Order View</h1>
                <form class="input-group mb-3" method="post">
                    <input class="form-control" name="table_inp" type="text" placeholder="Search Order ID" method="post">
                    <button class="btn btn-outline-secondary" name="search_btn" type="submit">Search</button>
                    <button class="btn btn-outline-secondary" name="show_tbl">Show Table</button>
                </form> 
                <?php 
                        if(isset($_POST['search_btn'])){
                            $sql = 'SELECT * FROM CustomerOrderInformation WHERE CustomerOrderID="'.$_POST['table_inp'].'"';
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                echo "Customer order found, " . $result->num_rows . " results:";
                            } else {
                                echo "No products found!";
                            }
                        } else {
                            $sql = "SELECT * FROM CustomerOrderInformation";
                            $result = $conn->query($sql);
                        }
                        
                        if(isset($_POST['show_tbl'])){
                            $sql = "SELECT * FROM CustomerOrderInformation";
                            $result = $conn->query($sql);
                        }

                        function display_product($searchResult){
                            if($searchResult->num_rows > 0){
                                while($row = $searchResult->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<th scope="row">' . $row["CustomerOrderID"] . '</th>';
                                    echo '<td>' . $row["CustomerID"] . '</td>';
                                    echo '<td>' . $row["Quantity"] . '</td>';
                                    echo '<td>' . $row["OrderPrice"]  . '</td>';
                                    echo '<td>' . $row["DeliveryAddress"]  . '</td>';
                                    echo '<td>' . $row["Time"]  . '</td>';
                                    echo '<td> ';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '0 Results found';
                            }
                        }
                    ?>
                <table class="table table-dark">
                    
                    <thead>
                        <tr>
                            <th scope="col">CustomerOrderID</th>
                            <th scope="col">CustomerID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">OrderPrice</th>
                            <th scope="col">DeliveryAddress</th>
                            <th scope="col">Time</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            display_product($result);
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php'?>
<?php
ob_end_flush();
?>