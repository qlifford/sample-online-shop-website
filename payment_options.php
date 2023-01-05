<div class="box"><!-- box Begin -->
        <?php
            $session_email = $_SESSION['email'];

            $select_customer = "select * from customers where email = '$session_email'";
            $select_customer_run = mysqli_query($con, $select_customer);
            $row_customer = mysqli_fetch_array($select_customer_run);

            $customer_id = $row_customer['customer_id'];




        ?>
    
    <h1> Your Payment Options</h1>  
    
     <p class="lead"><!-- lead text-center Begin -->
         
         <a href="orders.php?c_id=<?php echo $customer_id; ?>"> Pay Offline </a>
         
     </p><!-- lead text-center Finish -->
     
     
     <h3> Mpesa </h3>   
        <p class="lead"><!-- lead Begin -->            
            <a href="#">                                    
                <img class="img-responsive" src="images/mpesa.png" alt="Mpesa">                
            </a>            
        </p> <!-- lead Finish -->         
     
     
      
     <h3> PayPal </h3>     
        <p class="lead"><!-- lead Begin -->            
            <a href="#">                                       
                <img class="img-responsive" src="images/paypal.png" alt="Paypal">                
            </a>            
        </p> <!-- lead Finish -->
         
       
</div><!-- box Finish -->