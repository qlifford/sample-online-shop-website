<?php
session_start();
include("functions/functions.php");
include("db.php");
?>
<?php
if (isset($_GET['c_id'])) 
{
    $customer_id = $_GET['c_id'];    
}
$ip_add = getRealIpUser();
$status = "pending";
$invoice_no = mt_rand();

$select_cart = "select * from carts where ip_add='$ip_add'";
$select_cart_run = mysqli_query($con, $select_cart);
while($row_cart = mysqli_fetch_array($select_cart_run))
{
    $prod_id =  $row_cart['p_id'];
    $prod_qty =  $row_cart['qty'];
    $prod_size =  $row_cart['size'];

    $get_products = "select * from products where product_id = '$prod_id'";
    $get_products_run = mysqli_query($con, $get_products);
    while ($row_products = mysqli_fetch_array($get_products_run)) 
    {
        $sub_total = $row_products['product_price'] * $prod_qty;
        $insert_customer_order = "insert into customer_orders(customer_id,due_amount,invoice_no,qty,size,date,order_status) 
        values('$customer_id','$sub_total','$invoice_no','$prod_qty','$prod_size',NOW(),'$status')";

        $run_customer_order = mysqli_query($con, $insert_customer_order);

        $insert_pending_order = "insert into pending_orders(customer_id,invoice_no,product_id,qty,size,order_status) 
        values('$customer_id','$invoice_no','$prod_id','$prod_qty','$prod_size','$status')";
        $pending_order_run =  mysqli_query($con, $insert_pending_order);

        $delete_cart = "delete from carts where ip_add ='$ip_add'";
        $delete_cart_run = mysqli_query($con, $delete_cart);
        
        echo
        "<script>alert('Your order has been submitted, Thank you')</script>";
        echo
        "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }


}
?>
