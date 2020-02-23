<?php
    session_start();
    require_once("manage.database.php");

    date_default_timezone_set("Asia/Kolkata");

    $flag=$_REQUEST['action'];

    switch($flag)
    {
        case "profile":
            
            if(isset($_POST["from"]) && $_POST['from']=="android")
            {
                $Email=$_POST['email'];            
                $Firstname=$_POST['firstname'];
                $Lastname=$_POST['lastname'];
                $Gender=$_POST['gender'];
                $DOB=$_POST['dob'];
                $Address=$_POST['address'];
                $Pincode=$_POST['pincode'];
            }
            else
            {
            $Email=$_SESSION['CLogin_ID'];            
            $Firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
            $Lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
            $Gender=mysqli_real_escape_string($conn,$_POST['gender']);
            $DOB=mysqli_real_escape_string($conn,$_POST['dob']);
            $Address=mysqli_real_escape_string($conn,$_POST['address']);
            $Pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
            }
            
            $query1="update customer_registration set First_Name='$Firstname', Last_Name='$Lastname', Gender='$Gender', DOB='$DOB', Address='$Address', Pincode='$Pincode' where Email='$Email'";
            
            if(mysqli_query($conn,$query1))
            {
                if(isset($_POST["from"]) && $_POST['from']=="android")
                {
                    echo "success";
                }
                else
                {
                    header("Location:../Customer-Profile?success=update");
                    ?>
                    <script>
                        window.location.href="../Customer-Profile?success=update";
                    </script>
                    <?php
                }
            }
            else
            {
                if(isset($_POST["from"]) && $_POST['from']=="android")
                {
                    echo "error";
                }
                else
                {
                    header("Location:../Customer-Profile?error=query");
                    ?>
                    <script>
                        window.location.href="../Customer-Profile?error=query";
                    </script>
                    <?php
                }
            }
            
            break;
            
        case "orderaddress":
            
            if(isset($_POST['from']) && $_POST['from']=="android")
            {
                $Email=$_POST['email'];
                $sessionid=$_POST['sessionid'];
                $Address=$_POST['address'];
                $Pincode=$_POST['pincode'];
            }
            else
            {
                $Email=$_SESSION['CLogin_ID'];           
                $Address=mysqli_real_escape_string($conn,$_POST['address']);
                $Pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
            }         
            
           

            $query1="update customer_registration set Address='$Address', Pincode='$Pincode' where Email='$Email'";
            
            if(mysqli_query($conn,$query1))
            {
                
                if(isset($_POST['from']) && $_POST['from']=="android")
                {
                                $st1="false";
                                $query3="select count(*) from customer_cart where Session_ID='$sessionid' and Buy_Status='$st1'";
                                $res2=mysqli_query($conn,$query3);
                                $row2=mysqli_fetch_array($res2,MYSQL_BOTH);
                                if($row2['0']>0)
                                {
                                    $query1="select * from customer_cart where Session_ID='$sessionid' and Buy_Status='$st1'";
                                    $res1=mysqli_query($conn,$query1);
                                    $response1=array();
                                    while($row1=mysqli_fetch_array($res1,MYSQL_BOTH))
                                    {                 
                                        $pid=$row1['Product_ID'];
                                        $query2="select p_image from product_image where pid='$pid' limit 1";
                                        $res2=mysqli_query($conn,$query2);
                                        $row2=mysqli_fetch_array($res2,MYSQL_BOTH);
                                        $pic="Admin/ProductImage/".$row2['0'];
                                        
                                         $query3="select * from product where pid='$pid'";
                                         $res3=mysqli_query($conn,$query3);
                                         $row3=mysqli_fetch_array($res3,MYSQL_BOTH);
                                        array_push($response1,array("Cart_ID"=>$row1['Cart_ID'],"Product_Image"=>$pic,"Product_Name"=>$row3['product_name'],"Quantity"=>$row1['Quantity'],"Unit_Price"=>$row1['Unit_Price'],"Sub_Total"=>$row1['Sub_Total']));
                                    }
                                                
                                    $query1="select sum(Sub_Total) from customer_cart where Session_ID='$sessionid'";
                                    $res1=mysqli_query($conn,$query1);
                                    $row1=mysqli_fetch_array($res1,MYSQL_BOTH);
                                    $cartsubtotal=$row1['0'];
                                    $deliverycharge=0;
                                    if($cartsubtotal<1000)
                                    {
                                        $deliverycharge=100;
                                    }
                                    $total=$cartsubtotal+$deliverycharge;

                                    $response2=array();
                                    array_push($response2,array("CartSubTotal"=>$cartsubtotal,"Delivery_Charge"=>$deliverycharge,"Total"=>$total));
                                    
                                    $presponse1 = str_replace('\/','/',json_encode(array_merge(array("cartresult"=>$response1),array("amount"=>$response2))));
                                    echo $presponse1;
                                }
                }
                else
                {
                    header("Location:../Make-Order?success=confirm");
                    ?>
                    <script>
                        window.location.href="../Make-Order?success=confirm";
                    </script>
                    <?php
                }

                
            }
            else
            {
                header("Location:../Cart?error=query");
                ?>
                <script>
                    window.location.href="../Cart?error=query";
                </script>
                <?php
            }
            
            break;
            
        case "changepassword":
            
            if(isset($_POST['from']) && $_POST['from']=="android")
            {
                $email=$_POST['email'];
                $old=$_POST['oldpass']; 
                $old=md5($old);            
                $new=$_POST['newpass'];   
                $new=md5($new);            
                $cnew=$_POST['cnewpass'];
                $cnew=md5($cnew);
            }
            else
            {
                $email=$_SESSION['CLogin_ID'];
                $old=mysqli_real_escape_string($conn,$_POST['oldpass']);
                $old=md5($old);            
                $new=mysqli_real_escape_string($conn,$_POST['newpass']);
                $new=md5($new);            
                $cnew=mysqli_real_escape_string($conn,$_POST['cnewpass']);
                $cnew=md5($cnew);
            }


            if($new==$cnew)
            {
                $query1="select Password from customer_login where Email='$email'";
                $res1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_array($res1,MYSQL_BOTH);
                
                if($row1['Password']==$old)
                {
                    $query2="update customer_login set Password='$new' where Email='$email'";
                    $query3="update customer_registration set Password='$new' where Email='$Email'";
                    
                    if(mysqli_query($conn,$query2))
                    {
                        if(mysqli_query($conn,$query3))
                        {

                            if(isset($_POST['from']) && $_POST['from']=="android")
                            {
                                echo "success";
                            }
                            else
                            {
                            header("Location:../Customer-Profile?tab=changepassword&success=password");
                            ?>
                            <script>
                                window.location.href="../Customer-Profile?tab=changepassword&success=password";
                            </script>
                            <?php 
                            }
                            
                        }
                        else
                        {
                            header("Location:../Customer-Profile?tab=changepassword&error=query");
                            ?>
                            <script>
                                window.location.href="../Customer-Profile?tab=changepassword&error=query";
                            </script>
                            <?php 
                        }
                    }
                    else
                    {
                       header("Location:../Customer-Profile?tab=changepassword&error=query");
                        ?>
                        <script>
                            window.location.href="../Customer-Profile?tab=changepassword&error=query";
                        </script>
                        <?php 
                    }
                    
                }
                else
                {
                    if(isset($_POST['from']) && $_POST['from']=="android")
                            {
                                echo "oldpass";
                            }
                            else
                            {
                                
                    header("Location:../Customer-Profile?tab=changepassword&error=oldpass");
                    ?>
                    <script>
                        window.location.href="../Customer-Profile?tab=changepassword&error=oldpass";
                    </script>
                    <?php
                            }
                }
                
            }
            else
            {
                if(isset($_POST['from']) && $_POST['from']=="android")
                            {
                                echo "newpass";
                            }
                            else
                            {
                header("Location:../Customer-Profile?tab=changepassword&error=newpass");
                ?>
                <script>
                    window.location.href="../Customer-Profile?tab=changepassword&error=newpass";
                </script>
                <?php
                            }
            }
            break;
        
    }
?>
