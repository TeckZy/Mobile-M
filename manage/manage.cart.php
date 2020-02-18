<?php
    session_start();
  
    require_once("manage.database.php");
    date_default_timezone_set("Asia/Kolkata");
    $flag=$_REQUEST['action'];

	require_once("src/Instamojo.php");
	
	// For Testing
	
	//$API_KEY="test_9c3e4ed3b87a110da7a584c956d";
	//$AUTH_TOKEN="test_cc961bf1ead5dab1653bdf9fe2d";
	
	//For Live	
   $API_KEY="92b3ee7aa0e226920fc99e7a6c0a8636";
   $AUTH_TOKEN="b669da5bd9172f897df0a9d5d9dce3b3";

	$api = new Instamojo\Instamojo($API_KEY, $AUTH_TOKEN);
	
    switch($flag) 
	{
        case "add":
            $qty =1;
            $pid = $_REQUEST['pid'];
			
			if(!isset($_SESSION["LoginID"]))
            {  
				if(!isset($_SESSION["SystemID"]))
				{
					header("location:../signin.php?addcart=$pid");
				}
            }
			$email="";
			if(isset($_SESSION["LoginID"]))
			{
				$email = $_SESSION["LoginID"];
			}
			$systemid="";
			if(isset($_SESSION["SystemID"]))
			{
				$systemid=$_SESSION["SystemID"];
			}
			$checksql="select * from cart where ProductID='$pid' and (Email='$email' or SystemID='$systemid') and BuyStatus='false'";
			$checkres=mysqli_query($conn,$checksql);
			$checkrow=mysqli_fetch_array($checkres,MYSQLI_BOTH);
			if($checkrow==null)
		{
			$query = "select * from products where ProductID='$pid'";
			$res = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($res, MYSQLI_BOTH);
			if ($row['Status'] == "In-Stock") 
			 {
				$unitprice = $row['Price'];
				$dis=0;
				$newprice=$unitprice;
				if($row["Discount"]>0)
				{
					$dis=$row["Discount"];
					$disprice=$dis/100*$unitprice;
					$disprice=intval($disprice);
					$newprice=$unitprice-$disprice;
				}
				$subtotal = $qty * $newprice;
				$buystatus = "false";
				$date = date("Y-m-d h:i:sa");    
				$query2 = "insert into cart(Email,ProductID,Quantity,Price,SubTotal,BuyStatus,Date,SystemID) values('$email','$pid','$qty','$newprice','$subtotal','$buystatus','$date','$systemid')";
				if (mysqli_query($conn, $query2)) {
				   header("Location:../checkout.php");
				} else {
					header("Location:../index.php?msg=error");
				}
			} 
			else
			{
				header("Location:../index.php?msg=outofstock");
			}
			}
			else
			{
				header("Location:../index.php?msg=exist");
			}
			
             
            
        break;


 case "remove":
            $cartid = $_REQUEST['cartid'];
    
            $query1 = "delete from cart where CartID='$cartid'";
            if (mysqli_query($conn, $query1)) {
            header("Location:../checkout.php?msg=delete");
            }
            else {
                header("Location:../checkout.php?msg=error");
            }
            
            break;

 case "order":

            $email = $_SESSION['LoginID'];
            if (!isset($_SESSION['LoginID'])) 
            {
                header("Location:../signin.php");
            }
			   
			$subtotal = $_POST['subtotal'];
            $deliverycharge = $_POST["deliverycharge"];
            $tax=$_POST["tax"];
            $totalcharge=$_POST["totalcharge"];
            
            $name=$_POST["name"];
            $mobile=$_POST["mobile"];
            $emailalt=$_POST["email"];
            $city=$_POST["city"];
            $pincode=$_POST["pincode"];
            $address=$_POST["address"];
            
            $date = date("Y-m-d");
            $time = date("h:i:sa");
            $st1 = "true";
            $st2 = "false";

            $query2="insert into orders(Email,Name,Mobile,EmailAlt,City,Address,Pincode,SubTotal,DeliveryCharge,Tax,TotalCharge,Date,Time,StatusByCustomer,StatusByAdmin,DeliveryStatus,PaymentStatus) values('$email','$name','$mobile','$emailalt','$city','$address','$pincode','$subtotal','$deliverycharge','$tax','$totalcharge','$date','$time','$st2','$st2','$st2','$st2')";
            
            if (mysqli_query($conn, $query2)) {
                $orderid = mysqli_insert_id($conn);
				$_SESSION["OID"]=$orderid;
                require_once("class.logindetails.php");
                $logindetail = new logindetails;
                $mac = $logindetail->get_mac();
                $ip = $logindetail->get_ip();
                $browser = $logindetail->get_useragent();
                $os = $logindetail->get_os();
                $uname = $logindetail->get_userName();
                $orderfrom = "Website";

                $query3 = "insert into ordertracing(OrderID,Email,Mac,IP,Browser,OS,UserName,Date,Time,OrderFrom) values('$orderid','$email','$mac','$ip','$browser','$os','$uname','$date','$time','$orderfrom')";

                if (mysqli_query($conn, $query3)) 
				{
					$systemid=$_SESSION["SystemID"];
                    $query4 ="select * from cart where (Email='$email' or SystemID='$systemid') and BuyStatus='$st2'";
                    $res2 = mysqli_query($conn, $query4);
                    $ost  =true;
                    while ($row2 = mysqli_fetch_array($res2, MYSQLI_BOTH)) {

                        $pid = $row2['ProductID'];
                        $qty = $row2['Quantity'];
                        $uprice = $row2['Price'];

                        $query5 = "insert into orderproduct(OrderID,ProductID,Quantity,Price) values('$orderid','$pid','$qty','$uprice')";

                        if (mysqli_query($conn, $query5)) {
                            $ost = true;
                        } else {
                            $ost = false;
                        }
                    }
                    if ($ost == true){
                        $query6 = "update cart set BuyStatus='$st1' where (Email='$email' or SystemID='$systemid')";
                        mysqli_query($conn, $query6);
                        // header("Location:../Make-Order?success=confirm&oid=" . $order_id . "");
                        // echo "Order Success, Order id = ".$orderid;					
						
						try {
							$response = $api->paymentRequestCreate(array(
								"purpose" => "Shopping at MobileM",
								"amount" => "$totalcharge",
								"phone" => "$mobile",
								"buyer_name" => "$name",
								"send_sms" => true,
								"send_email" => true,
								"email" => "$email",
								"redirect_url" => "http://www.mobilem.in/manage/manage.cart.php?action=ordersummery"
								));
						    }
						catch (Exception $e) {
							print('Error: ' . $e->getMessage());
						}
						print_r($response);
						$paymentreqid=$response["id"];
						$query5="update orders set PaymentReqID='$paymentreqid' where OrderID='$orderid'";
						if(mysqli_query($conn,$query5))
						{
							$urlto=$response["longurl"];
							header("Location:".$urlto);
						}
						else
						{
							echo "PaymentReqID Update Failed";
						}
						
                    } else {
                        header("Location:../index.php?action=checkout&msg=ordererror1");
                    }
                } else {
                    header("Location:../index.php?action=checkout&msg=ordererror2");
                }
            } else {
                header("Location:../index.php?action=checkout&msg=ordererror3");
            }
		   
            
            
        break;

   case "updateqty":
            $qty = intval($_REQUEST['qty']);
            $id = intval($_REQUEST['cartid']);
            $query1 = "select Price from cart where CartID='$id'";
            $res1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($res1, MYSQL_BOTH);
            $unitprice = intval($row1['Price']);
            $subtotal = $qty * $unitprice;
            $query = "update cart set Quantity='$qty', SubTotal='$subtotal' where CartID='$id'";
            if (mysqli_query($conn, $query)) {
                header("Location:../checkout.php?msg=updtqty");
            } else {
                header("Location:../checkout.php?msg=error");
            }
		break;
			
		case "ordersummery":
			
			$orderid=$_SESSION["OID"];
			$payid=$_REQUEST['payment_id'];
			$payreqid=$_REQUEST['payment_request_id'];
			try {
				$response = $api->paymentRequestStatus($payreqid);
				// print_r($response);
				
				$paystatus=$response['payments'][0]['status'];
				
				if($paystatus=="Credit")
				{
					$st1="true";
					$sql1="update orders set PaymentID='$payid', PaymentStatus='$st1', StatusByCustomer='$st1' where OrderID='$orderid'";
					if(mysqli_query($conn,$sql1))
					{
						header("Location:../Order-Summery.php?msg=transactionsuccess");	
					}
					else
					{
						header("Location:../checkout.php?msg=paymenterror");
					}
				}
				else
				{
					$st1="true";
					$sql1="update orders set PaymentID='$payid', StatusByCustomer='$st1' where OrderID='$orderid'";
					if(mysqli_query($conn,$sql1))
					{
						header("location:../Order-Summery.php?msg=transactionerror");	
					}
					else
					{
						header("location:../checkout.php?msg=paymenterror");
					}
				}
				
			}
			catch (Exception $e) {
				print('Error: ' . $e->getMessage());
			}
			
		break;

    }  
   
?>