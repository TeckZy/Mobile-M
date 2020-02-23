<!DOCTYPE html>
<html>

<head>
    <?php include('link.php'); ?>

    <style>
        #time-range p {
            font-family: "Arial", sans-serif;
            font-size: 14px;
            color: #333;
        }

        .ui-slider-horizontal {
            height: 8px;
            background: #D7D7D7;
            border: 1px solid #BABABA;
            box-shadow: 0 1px 0 #FFF, 0 1px 0 #CFCFCF inset;
            clear: both;
            margin: 8px 0;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            -ms-border-radius: 6px;
            -o-border-radius: 6px;
            border-radius: 6px;
        }

        .ui-slider {
            position: relative;
            text-align: left;
        }

        .ui-slider-horizontal .ui-slider-range {
            top: -1px;
            height: 100%;
        }

        .ui-slider .ui-slider-range {
            position: absolute;
            z-index: 1;
            height: 8px;
            font-size: .7em;
            display: block;
            border: 1px solid #5BA8E1;
            box-shadow: 0 1px 0 #AAD6F6 inset;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            -khtml-border-radius: 6px;
            border-radius: 6px;
            background: #81B8F3;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #A0D4F5), color-stop(100%, #81B8F3));
            background-image: -webkit-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: -moz-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: -o-linear-gradient(top, #A0D4F5, #81B8F3);
            background-image: linear-gradient(top, #A0D4F5, #81B8F3);
        }

        .ui-slider .ui-slider-handle {
            border-radius: 50%;
            background: #F9FBFA;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgi…pZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiIC8+PC9zdmc+IA==');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0, 50% 100%, color-stop(0%, #C7CED6), color-stop(100%, #F9FBFA));
            background-image: -webkit-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: -moz-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: -o-linear-gradient(top, #C7CED6, #F9FBFA);
            background-image: linear-gradient(top, #C7CED6, #F9FBFA);
            width: 22px;
            height: 22px;
            -webkit-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            -moz-box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            box-shadow: 0 2px 3px -1px rgba(0, 0, 0, 0.6), 0 -1px 0 1px rgba(0, 0, 0, 0.15) inset, 0 1px 0 1px rgba(255, 255, 255, 0.9) inset;
            -webkit-transition: box-shadow .3s;
            -moz-transition: box-shadow .3s;
            -o-transition: box-shadow .3s;
            transition: box-shadow .3s;
        }

        .ui-slider .ui-slider-handle {
            position: absolute;
            z-index: 2;
            width: 22px;
            height: 22px;
            cursor: default;
            border: none;
            cursor: pointer;
        }

        .ui-slider .ui-slider-handle:after {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            top: 50%;
            margin-top: -4px;
            left: 50%;
            margin-left: -4px;
            background: #30A2D2;
            -webkit-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
            -moz-box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 white;
            box-shadow: 0 1px 1px 1px rgba(22, 73, 163, 0.7) inset, 0 1px 0 0 #FFF;
        }

        .ui-slider-horizontal .ui-slider-handle {
            top: -.5em;
            margin-left: -.6em;
        }

        .ui-slider a:focus {
            outline: none;
        }

        #slider-range {
            width: 90%;
            margin: 0 auto;
        }

        #time-range {
            width: 400px;
        }
    </style>

</head>

<body>
    <?php
    if (!isset($_SESSION["LoginID"])) {
        header("location:./");
    }
    ?>
    <?php
    $err = "";
    $success = "";

    if (isset($_REQUEST["error"])) {
        $err = $_REQUEST['error'];
    }
    if (isset($_REQUEST["success"])) {
        $success = $_REQUEST['success'];
    }
    if ($err == "reg") {
    ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: "Error !",
                    text: "There is some Technical Error. Please Contact Your Admin or try again leter",
                    type: "error",
                    confirmButtonText: "Okay"
                });
            });
        </script>
    <?php
    }

    if ($err == "exist") {
    ?>
        <script>
            $(document).ready(function() {
                swal({
                    title: "Warning !",
                    text: "Mobile number or Email you are using is already registered. Please use different mobile or email.",
                    type: "warning",
                    confirmButtonText: "Okay"
                });
            });
        </script>
    <?php
    }

    ?>
    <!--header-->
    <?php
    include('header.php');
    ?>
    <!--//header-->
    
    <div class="conatiner">
        <?php
        $user = $_SESSION["LoginID"];
        //echo $user;

        $select = "select * from registration LEFT JOIN addresses ON registration.UserID=addresses.registration_id where registration.Email='$user'";
        $q = mysqli_query($conn, $select) or die('Error');
        $row = mysqli_fetch_array($q, MYSQLI_ASSOC);
    //    echo json_encode($row);
        ?>
        <h3 class="title">My <span> Profile</span></h3>



        <!-------------------------------------------------------------------------------------------->

        <div class="row">
            <a class="waves-effect waves-light" onClick='M.toast({html: "<p class=\" green-text darken-3\">YAHOOOOO</p>",class: "rounded"})'>Click me</a>
            <div class="col l4 s12">
                <!-- tabs  -->
                <div class="card-panel">
                    <ul style="height: auto; white-space: normal;" class="tabs">
                        <li class="tab"> <a href="#general" class="active">General </a></li>
                        <br>
                        <li class="tab"><a href="#change-password">Change Password</a></li>
                        <br>
                        <li class="tab"><a href="#info">Manage Your Addresses</a></li>
                        <br>
                        <li class="tab"><a href="#myOrders">My Orders</a></li>

                        <li class="indicator" style="left: 0px; right: 0px;"></li>
                    </ul>
                </div>
            </div>
            <div class="col l8 s12">
                <!-- tabs content -->
                <div id="myOrders">
                    <div class="">
                        <table class="table invoice-data-table white border-radius-4 pt-1 dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 3px; display: none;" aria-label=""></th>
                                    <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 3px;" data-col="1" aria-label=""><input type="checkbox"></th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 75px;" aria-sort="ascending" aria-label="Invoice#: activate to sort column descending">
                                        <span>Invoice#</span>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 81px;" aria-label="Amount: activate to sort column ascending">Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 51px;" aria-label="Date: activate to sort column ascending">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 154px;" aria-label="Customer: activate to sort column ascending">Customer</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 86px;" aria-label="Tags: activate to sort column ascending">Tags</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 114px;" aria-label="Status: activate to sort column ascending">Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 207px;" aria-label="Action">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr role="row" class="odd">
                                    <td class=" control" tabindex="0" style="display: none;"></td>
                                    <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes"></td>
                                    <td class="sorting_1">
                                        <a class="waves-effect waves-light modal-trigger" href="#myInvoice_Modal">INV-00123</a>
                                    </td>
                                    <td><span class="invoice-amount">$15,900</span></td>
                                    <td><small>23-07-19</small></td>
                                    <td><span class="invoice-customer">Toyota Motor</span></td>
                                    <td>
                                        <span class="bullet blue"></span>
                                        <small>Car</small>
                                    </td>
                                    <td><span class="chip lighten-5 green green-text">PAID</span></td>
                                    <td>
                                        <div class="invoice-action">
                                            <a href="app-invoice-view.html" class="invoice-action-view mr-4">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- PROFILE -->
                <div id="general" class="active">
                    <div class="card-panel">

                        <!-- <div class="divider mb-1 mt-1"></div> -->

                        <form id="profileForm" action="manage/manage.MyProfilecode.php" class="formValidate" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <label for="name" class="active">Full Name</label>
                                        <input type="text" id="name" name="name"  class="validate" required="" aria-required="true" value="<?php echo $row['Name']; ?>" />
                                        <small class="errorTxt1"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                        <label for="mobile" class="active">Mobile</label>
                                        <input type="text" id="mobile" name="mobile"  class="validate" required="" aria-required="true" value="<?php echo $row['Mobile']; ?>" />
                                        <small class="errorTxt2"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                        <label for="email" class="active">E-mail</label>
                                        <input type="text" id="email" name="email"  class="validate" required="" aria-required="true" value="<?php echo $row['Email']; ?>" readonly />
                                        <small class="errorTxt3"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="card-alert card orange lighten-5">
                                        <div class="card-content orange-text">
                                            <p>Your email is not confirmed. Please check your inbox.</p>
                                            <a href="javascript: void(0);">Resend confirmation</a>
                                        </div>
                                        <button type="button" class="close orange-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field col s6">
                                        <select name="gender" value="<?php echo $row[3]; ?>">
                                            <option disabled selected><?php echo $row['Gender']; ?></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        <label>Select Gender</label>
                                    </div>
                                </div>
                                <div class="col s12 display-flex justify-content-end form-action">
                                    <button onClick="SUBMIT('#profileForm')" class="btn indigo waves-effect waves-light mr-2">
                                        Save changes
                                    </button>
                                    <button type="button" class="btn btn-light-pink waves-effect waves-light mb-1">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CHANGE-PASSWORD -->
                <div id="change-password" style="display: none;">
                    <div class="card-panel">
                        <form id="chPassForm" action="manage/manage.MyProfilecode.php" class="paaswordvalidate" novalidate="novalidate">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field">
                                        <input id="oldpswd" name="newPassword" type="password"  class="validate" required="" aria-required="true">
                                        <label for="oldpswd">Old Password</label>
                                        <small class="errorTxt4"></small>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                        <input id="newpswd" name="rePassword" type="password"  class="validate" required="" aria-required="true">
                                        <label for="newpswd">New Password</label>
                                        <small class="errorTxt5"></small>
                                    </div>
                                </div>
                                <div class="col s12 display-flex justify-content-end form-action">
                                    <button onClick="SUBMIT('#chPassForm')" class="btn indigo waves-effect waves-light mr-1">Save changes</button>
                                    <button type="reset" class="btn btn-light-pink waves-effect waves-light">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="info" style="display: none;">
                    <div class="card-panel">

                        <!-- <div class="divider mb-1 mt-1"></div> -->

                        <form autocomplete="off" id="profileAddressForm" action="manage/manage.MyProfilecode.php" class="formValidate" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field col s6">
                                            <select name="addressType" value="Address Type">
                                                <?php if($row['type'] != null){if($row['Type'] == 0){echo '<option selected disabled>Home</option>';}else{echo '<option selected disabled>Office</option>';}} ?>
                                                <option value = "0">Home</option>
                                                <option  value = "1">Office</option>
                                            </select>
                                            <label>Address Type</label>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <!-- Switch -->
                                        <div class="switch">
                                            <label>
                                                I'm Available All Day :
                                                <input name="availTime" type="checkbox" required="" aria-required="true" <?php if($row['Timings'] == null || $row['Timings'] ==0 ){echo 'checked';} ?>>
                                                <span class="lever"></span>

                                            </label>
                                        </div>
                                        <?php if($row['Timings'] != null && $row['Timings'] != 0 ){echo '<h5>Availability : <h5>'.$row['Timings'];} ?>
                                        <div id="timespec">
                                            <h4 class="center">Please Share an approx. Time of your Availability</h4>
                                            <div class="col s6">
                                               
                                                <h4>From :</h4> <input type="time" name="availFrom">
                                            </div>
                                            <div class="col s6">
                                                <h4>To :</h4> <input type="time" name="availTo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <div class="input-field col s6">
                                            <select name="state" value="Choose Your State">
                                            <?php if($row['State'] != null && "" != trim($row['State'])){echo '<option selected disabled>'.$row['State'].'</option>';}?><option>
                                                
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                <option value="Daman and Diu">Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Tripura">Tripura</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                            </select>
                                            <label>Select State</label>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                       
                                        <input type="text" id="city" name="city" <?php if($row['City'] != null){echo 'value="'.$row['City'].'"';}?>  class="validate" required="" aria-required="true" />
                                        <label for="city" >City:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input type="text"  class="validate" <?php if($row['Pincode'] != null){echo 'value="'.$row['Pincode'].'"';}?> required="" aria-required="true" id="pincode" name="pincode"></textarea>
                                        <label for="pincode">Pincode:</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input type="text" id="landmark" <?php if($row['landmark'] != null){echo 'value="'.$row['landmark'].'"';}?> name="landmark" class="validate" />
                                        <label for="landmark">Landmark(Optional):</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="address" name="address"  class="validate" required="" aria-required="true" class="materialize-textarea"></textarea>
                                        <label for="address"><?php if($row['address'] != null){echo $row['address'];}?></label>
                                    </div>
                                
                                </div>
                            </div>

                            <div class="col s12 display-flex justify-content-end form-action">
                                <button onClick="SUBMIT('#profileAddressForm')" class="btn indigo waves-effect waves-light mr-2">
                                    Save changes
                                </button>
                                <button type="button" class="btn btn-light-pink waves-effect waves-light mb-1">Cancel</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- NOTIFICATIONS -->
            <div id="notifications" style="display: none;">
                <div class="card-panel">
                    <div class="row">
                        <h6 class="col s12 mb-2">Activity</h6>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked="" id="accountSwitch1">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">Email me when someone comments on my article</span>
                            </div>
                        </div>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked="" id="accountSwitch2">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">
                                    Email me when someone answers on my form</span>
                            </div>
                        </div>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" id="accountSwitch3">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">
                                    Email me hen someone follows me</span>
                            </div>
                        </div>
                        <h6 class="col s12 mb-2 mt-2">Application</h6>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" checked="" id="accountSwitch4">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">News and announcements</span>
                            </div>
                        </div>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" id="accountSwitch5">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">Weekly product updates</span>
                            </div>
                        </div>
                        <div class="col s12 mb-1">
                            <div class="switch">
                                <label>
                                    <input type="checkbox" class="custom-control-input" checked="" id="accountSwitch6">
                                    <span class="lever"></span>
                                </label>
                                <span class="switch-label w-100">Weekly blog digest</span>
                            </div>
                        </div>
                        <div class="col s12 display-flex justify-content-end form-action mt-2">
                            <button type="submit" class="btn indigo waves-light waves-effect mr-sm-1 mr-2">Save
                                changes</button>
                            <button type="button" class="btn btn-light-pink waves-light waves-effect">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!----------------------------------------------------------------------------------------------->

    <div id="myInvoice_Modal" class="modal">
        <a style="float:right;" class="center modal-close waves-effect waves-green btn-flat"><i class="fa fa-close"></i></a>
        <div class="modal-content">

            <div class="card">
                <div class="card-content invoice-print-area">
                    <!-- header section -->
                    <div class="row invoice-date-number">
                        <div class="col xl4 s12">
                            <span class="invoice-number mr-1">Invoice#</span>
                            <span>000756</span>
                        </div>
                        <div class="col xl8 s12">
                            <div class="invoice-date display-flex align-items-center flex-wrap">
                                <div class="mr-3">
                                    <small>Date Issue:</small>
                                    <span>08/10/2019</span>
                                </div>
                                <div>
                                    <small>Date Due:</small>
                                    <span>08/10/2019</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- logo and title -->
                    <div class="row mt-3 invoice-logo-title">
                        <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                            <img src="../../../app-assets/images/gallery/pixinvent-logo.png" alt="logo" height="46" width="164">
                        </div>
                        <div class="col m6 s12 pull-m6">
                            <h4 class="indigo-text">Invoice</h4>
                            <span>Software Development</span>
                        </div>
                    </div>
                    <div class="divider mb-3 mt-3"></div>
                    <!-- invoice address and contact -->
                    <div class="row invoice-info">
                        <div class="col m6 s12">
                            <h6 class="invoice-from">Bill From</h6>
                            <div class="invoice-address">
                                <span>Clevision PVT. LTD.</span>
                            </div>
                            <div class="invoice-address">
                                <span>9205 Whitemarsh Street New York, NY 10002</span>
                            </div>
                            <div class="invoice-address">
                                <span>hello@clevision.net</span>
                            </div>
                            <div class="invoice-address">
                                <span>601-678-8022</span>
                            </div>
                        </div>
                        <div class="col m6 s12">
                            <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
                            <h6 class="invoice-to">Bill To</h6>
                            <div class="invoice-address">
                                <span>Pixinvent PVT. LTD.</span>
                            </div>
                            <div class="invoice-address">
                                <span>203 Sussex St. Suite B Waukegan, IL 60085</span>
                            </div>
                            <div class="invoice-address">
                                <span>pixinvent@gmail.com</span>
                            </div>
                            <div class="invoice-address">
                                <span>987-352-5603</span>
                            </div>
                        </div>
                    </div>
                    <div class="divider mb-3 mt-3"></div>
                    <!-- product details table-->
                    <div class="invoice-product-details">
                        <table class="striped responsive-table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Qty</th>
                                    <th class="right-align">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Frest Admin</td>
                                    <td>HTML Admin Template</td>
                                    <td>28</td>
                                    <td>1</td>
                                    <td class="indigo-text right-align">$28.00</td>
                                </tr>
                                <tr>
                                    <td>Apex Admin</td>
                                    <td>Anguler Admin Template</td>
                                    <td>24</td>
                                    <td>1</td>
                                    <td class="indigo-text right-align">$24.00</td>
                                </tr>
                                <tr>
                                    <td>Stack Admin</td>
                                    <td>HTML Admin Template</td>
                                    <td>24</td>
                                    <td>1</td>
                                    <td class="indigo-text right-align">$24.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- invoice subtotal -->
                    <div class="divider mt-3 mb-3"></div>
                    <div class="invoice-subtotal">
                        <div class="row">
                            <div class="col m5 s12">
                                <p>Thanks for your business.</p>
                            </div>
                            <div class="col xl4 m7 s12 offset-xl3">
                                <ul>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Subtotal</span>
                                        <h6 class="invoice-subtotal-value">$72.00</h6>
                                    </li>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Discount</span>
                                        <h6 class="invoice-subtotal-value">- $ 09.60</h6>
                                    </li>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Tax</span>
                                        <h6 class="invoice-subtotal-value">21%</h6>
                                    </li>
                                    <li class="divider mt-2 mb-2"></li>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Invoice Total</span>
                                        <h6 class="invoice-subtotal-value">$ 61.40</h6>
                                    </li>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Paid to date</span>
                                        <h6 class="invoice-subtotal-value">- $ 00.00</h6>
                                    </li>
                                    <li class="display-flex justify-content-between">
                                        <span class="invoice-subtotal-title">Balance (USD)</span>
                                        <h6 class="invoice-subtotal-value">$ 10,953</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.validate({

                validateOnBlur: false,
                errorMessagePosition: 'top',
                scrollToTopOnError: false
            });
        });
    </script>
    <!--//login-->
    <!--footer-->
    <?php include('footer1.php'); ?>
    <!--//footer-->
    <script>
        $(document).ready(function() {
            $("#timespec").hide();
            $("input").change(function() {
                if ($(this).is(":checked")) {
                    console.log("checked");
                    $("#timespec").slideUp();
                } else {
                    $("#timespec").slideDown();
                    specifyAvailability()

                }
            })
        });

        function specifyAvailability() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 15,
                values: [540, 1020],
                slide: function(e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';
                    if (hours1 >= 12) {
                        if (hours1 == 12) {
                            hours1 = hours1;
                            minutes1 = minutes1 + " PM";
                        } else {
                            hours1 = hours1 - 12;
                            minutes1 = minutes1 + " PM";
                        }
                    } else {
                        hours1 = hours1;
                        minutes1 = minutes1 + " AM";
                    }
                    if (hours1 == 0) {
                        hours1 = 12;
                        minutes1 = minutes1;
                    }



                    $('.slider-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';
                    if (hours2 >= 12) {
                        if (hours2 == 12) {
                            hours2 = hours2;
                            minutes2 = minutes2 + " PM";
                        } else if (hours2 == 24) {
                            hours2 = 11;
                            minutes2 = "59 PM";
                        } else {
                            hours2 = hours2 - 12;
                            minutes2 = minutes2 + " PM";
                        }
                    } else {
                        hours2 = hours2;
                        minutes2 = minutes2 + " AM";
                    }

                    $('.slider-time2').html(hours2 + ':' + minutes2);
                }
            });
        }
    </script>
</body>

</html>