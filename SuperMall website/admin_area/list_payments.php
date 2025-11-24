<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Orders</title>
</head>
<body>
    <h3 class="text-center text-success">All Payments</h3>
    <table class="table table-bordered mt-5">
        <thead class="text-center">
            <?php
              $get_payments="Select * from user_payments";
              $result=mysqli_query($con, $get_payments);
              $row_count=mysqli_num_rows($result);
              
        
        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payments Yet</h2>";
        }else{
               echo "<tr>
                <th>SNO</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Date</th>
                <th>Delete</th>
                </tr>
                </thead>
                <tbody class='text-center'>";

            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $invoice_number=$row_data['invoice_number'];
                $amount=$row_data['amount'];
                $date=$row_data['date'];
                $payment_mode=$row_data['payment_mode'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td>
                   <a href=''>
                            <i class='fa-solid fa-trash text-danger'></i>
                   </a>
                </td>
            </tr>";
            }
          }

            ?>
            
        </tbody>
    </table>
</body>
</html> 