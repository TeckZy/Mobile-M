
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 heading1"> Recent Products </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
			 
			 
			     <div class="col-sm-12">
                    <div class="owl-carousel owl-theme" id="recentproductslider" >
                        
                        <?php
                            $sqlproduct="select * from products order by ProductID desc limit 0,10";
                            $resproduct=mysqli_query($conn,$sqlproduct);
                            while($rowproduct=mysqli_fetch_array($resproduct,MYSQL_BOTH))
                            {
                        ?>
                       
                        <div class="item">
                            <a href="Product-Full-View?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
                            <div class="col-sm-12 productgrid wow ZoomIn" data-wow-duration="0.5s" data-wow-delay="0.2s" >
                                <div class="col-sm-12 product">
                                    <div class="col-sm-12 productpic">
                                        <img style="padding:0px 50px;" src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>" />
                                    </div>
                                    <div class="col-sm-12 productdetails">
                                        <br/>
                                        <p class="producttitle">
                                            <span class="text1"><?php echo $rowproduct["Name"]; ?></span>
                                            <br/>
                                            <small class="text1"><?php echo $rowproduct["SubName"]; ?></small>
                                        </p>
                                        <p class="productprice">
                                            <?php
                                            if($rowproduct["Discount"]>0)
                                            {
                                                $dis=$rowproduct["Discount"];
                                                $price=$rowproduct["Price"];
                                                $disprice=$dis/100*$price;
                                                $disprice=intval($disprice);
                                                $newprice=$price-$disprice;
                                            ?>
                                            <span class="label label-danger" style="padding:3px 3px;"><?php echo $dis; ?> %</span>
                                            <s style="color:gray;"><i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?></s> &nbsp;&nbsp;
                                            <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-                                             
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?> /- 
                                            <?php
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-sm-12">
                                        
                                        <?php
                                        if($rowproduct["Status"]=="In-Stock")
                                        {
                                        ?>
                                        <a href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>" class="btn btn-success">Add to Cart</a>
                                        <?php
                                        }
                                        else        
                                        {                                   
                                        ?>
                                        <a href="" class="btn btn-success disabled">Add to Cart</a> <label class="label label-warning">Out of Stock</label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                       
                        
                        <?php
                            }
                        ?>
                        
                        
                    </div>
                
			  </div>
                
            </div>
            