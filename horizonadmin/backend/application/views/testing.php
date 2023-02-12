
<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php');

$entry_name = '';
$tag = "";

$car_d_id = '';
$acc_no = '';
$vm_id = "";
$m_id = "";

$carname = "";
$CDPlayer = "";
$SunRoof = "";
$LeatherSeat = "";
$AlloyWheels = "";
$PowerSteering = "";
$PowerWindow = "";
$AC = "";
$ABS = "";
$Airbag = "";
$Radio = "";
$CDChanger = "";
$DVD = "";
$TV = "";
$PoweSeat = "";
$BackTire = "";
$GrillGuard = "";
$RearSpoiler = "";
$CentralLocking = "";
$Jack = "";
$SpareTire = "";
$WheelSpanner = "";

$carprice = "";
$Bodytype = "";
$Fuel = "";
$Transmission = "";
$Steering = "";


$VehicleNo = "";
$Chassis = "";
$ModelCode = "";
$VersionClass = "";
$EngineCode = "";
$Mileage = "";
$EngineSize = "";
$RegistrationYear = "";
$RegistrationMonth = "";
$ManufactureYear = "";
$ManufactureMonth = "";
$Ext_Color = "";
$WheelDrive = "";
$Location = "";
$Dimension = "";
$Doors = "";
$M3 = "";
$Seats = "";
$Weight = "";
$Country = "";
$car_tag = "";
$cardisprice = "";

$Title = "";
$Keywords = "";
$Description = "";

?>


<section>
    <div class="section-body">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="row">

                    <div id="page_content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card panel card-underline">
                                    <div class="card-head">
                                        <header>
                                            <h3>Add New Car Details</h3>
                                        </header>

                                    </div>
                                    <div>

                                        <div class="card-body">

                                            <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                                                <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                                                <div></div>
                                            </div>

                                            <form id="myform" class="form form-validate">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select class="form-control select2-list" id="vm_id" name="vm_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="vm_id">
                                                                Select Car Manufacturer Name *
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select class="form-control select2-list" id="m_id" name="m_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="m_id">
                                                                Select Car Model Name *
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="carname" name="carname" maxlength="300" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 300 characters allowed" value="<?= $carname; ?>" required="true">
                                                            <label for="Car Name">
                                                                Car Name *
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3>Select Standard Features:</h3>
                                                <br>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="CDPlayer" name="CDPlayer" <?php if ($CDPlayer == "1") echo "checked";?>><span>CD Player</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="SunRoof" name="SunRoof" <?php if ($SunRoof == "1") echo "checked";
                                                                                                                else echo ""; ?>><span>Sun Roof</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="LeatherSeat" name="LeatherSeat" <?php if ($LeatherSeat == "1") echo "checked";
                                                                                                                        else echo ""; ?>><span>Leather Seat</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="AlloyWheels" name="AlloyWheels" <?php if ($AlloyWheels == "1") echo "checked";?>><span>Alloy Wheels</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PowerSteering" name="PowerSteering" <?php if ($PowerSteering == "1") echo "checked";?>><span>Power Steering</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PowerWindow" name="PowerWindow" <?php if ($PowerWindow == "1") echo "checked";?>><span>Power Window</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="AC" name="AC" <?php if ($AC == "1") echo "checked";?>><span>A/C</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="ABS" name="ABS" <?php if ($ABS == "1") echo "checked";?>><span>ABS</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Airbag" name="Airbag" <?php if ($Airbag == "1") echo "checked";?>><span>Airbag</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Radio" name="Radio" <?php if ($Radio == "1") echo "checked";?>><span>Radio</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="CDChanger" name="CDChanger" <?php if ($CDChanger == "1") echo "checked";?>><span>CD Changer</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="DVD" name="DVD" <?php if ($DVD == "1") echo "checked";?>><span>DVD</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="TV" name="TV" <?php if ($TV == "1") echo "checked"; ?>><span>TV</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PoweSeat" name="PoweSeat" <?php if ($PoweSeat == "1") echo "checked";?>><span>Power Seat</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="BackTire" name="BackTire" <?php if ($BackTire == "1") echo "checked";?>><span>Back Tire</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="GrillGuard" name="GrillGuard" <?php if ($GrillGuard == "1") echo "checked";?>><span>Grill Guard</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="RearSpoiler" name="RearSpoiler" <?php if ($RearSpoiler == "1") echo "checked";?>><span>Rear Spoiler</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="CentralLocking" name="CentralLocking" <?php if ($CentralLocking == "1") echo "checked";?>><span>Central Locking</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Jack" name="Jack" <?php if ($Jack == "1") echo "checked";?>><span>Jack</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="SpareTire" name="SpareTire" <?php if ($SpareTire == "1") echo "checked";?>><span>Spare Tire</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="WheelSpanner" name="WheelSpanner" <?php if ($WheelSpanner == "1") echo "checked";?>><span>Wheel Spanner</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <br>
                                                <h3>Car Specification:</h3>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="carprice" name="carprice" max="99999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 5 digit allowed Format Price is : $65000" value="<?= $carprice; ?>" required="true">
                                                            <label for="Car Price">
                                                                Car Price *
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="bodytype" name="bodytype[]" class="form-control select2-list" multiple="multiple">
                                                            </select>
                                                            <label for="bodytype">Body Types *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="fuel" name="fuel" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="1" <?php if ($Fuel == "1") echo 'selected="selected"'; ?>>CNG</option>


                                                                <option value="2" <?php if ($Fuel == "2") echo 'selected="selected"'; ?>>Diesel</option>



                                                                <option value="3" <?php if ($Fuel == "3") echo 'selected="selected"'; ?>>Electric</option>



                                                                <option value="4" <?php if ($Fuel == "4") echo 'selected="selected"'; ?>>LPG</option>



                                                                <option value="5" <?php if ($Fuel == "5") echo 'selected="selected"'; ?>>Petrol</option>

                                                            </select>
                                                            <label for="fuel">Fuel *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="transmission" name="transmission" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="1" <?php if ($Transmission == "1") echo 'selected="selected"'; ?>>Automatic</option>



                                                                <option value="2" <?php if ($Transmission == "2") echo 'selected="selected"'; ?>>Manual</option>



                                                                <option value="3" <?php if ($Transmission == "3") echo 'selected="selected"'; ?>>Automanual</option>

                                                            </select>
                                                            <label for="transmission">Transmission *</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select id="steering" name="steering" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="1" <?php if ($Steering == "1") echo 'selected="selected"'; ?>>Left</option>



                                                                <option value="2" <?php if ($Steering == "2") echo 'selected="selected"'; ?>>Right</option>

                                                            </select>
                                                            <label for="steering">Steering *</label>
                                                        </div>
                                                    </div>





                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="VehicleNo" name="VehicleNo" max="99999999999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 11 digit allowed Format Vehicle No. is : 725040" value="<?= $VehicleNo; ?>" required="true">
                                                            <label for="VehicleNo">
                                                                Vehicle No. *
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Chassis" name="Chassis" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $Chassis; ?>">
                                                            <label for="Chassis">
                                                                Chassis #
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="ModelCode" name="ModelCode" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $ModelCode; ?>">
                                                            <label for="ModelCode">
                                                                Model Code
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="VersionClass" name="VersionClass" maxlength="200" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 200 characters are allowed" value="<?= $VersionClass; ?>">
                                                            <label for="VersionClass">
                                                                Version/Class
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="EngineCode" name="EngineCode" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $EngineCode; ?>">
                                                            <label for="EngineCode">
                                                                Engine Code
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Mileage" name="Mileage" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $Mileage; ?>">
                                                            <label for="Mileage">
                                                                Mileage
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="EngineSize" name="EngineSize" maxlength="10" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 10 characters are allowed" value="<?= $EngineSize; ?>">
                                                            <label for="EngineSize">
                                                                Engine Size
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="RegistrationYear" name="RegistrationYear" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="2021" <?php if ($RegistrationYear == "2021") echo 'selected="selected"'; ?>>2021</option>
                                                                <option value="2020" <?php if ($RegistrationYear == "2020") echo 'selected="selected"'; ?>>2020</option>
                                                                <option value="2019" <?php if ($RegistrationYear == "2019") echo 'selected="selected"'; ?>>2019</option>

                                                                <option value="2018" <?php if ($RegistrationYear == "2018") echo 'selected="selected"'; ?>>2018</option>



                                                                <option value="2017" <?php if ($RegistrationYear == "2017") echo 'selected="selected"'; ?>>2017</option>



                                                                <option value="2016" <?php if ($RegistrationYear == "2016") echo 'selected="selected"'; ?>>2016</option>



                                                                <option value="2015" <?php if ($RegistrationYear == "2015") echo 'selected="selected"'; ?>>2015</option>



                                                                <option value="2014" <?php if ($RegistrationYear == "2014") echo 'selected="selected"'; ?>>2014</option>



                                                                <option value="2013" <?php if ($RegistrationYear == "2013") echo 'selected="selected"'; ?>>2013</option>



                                                                <option value="2012" <?php if ($RegistrationYear == "2012") echo 'selected="selected"'; ?>>2012</option>



                                                                <option value="2011" <?php if ($RegistrationYear == "2011") echo 'selected="selected"'; ?>>2011</option>



                                                                <option value="2010" <?php if ($RegistrationYear == "2010") echo 'selected="selected"'; ?>>2010</option>



                                                                <option value="2009" <?php if ($RegistrationYear == "2009") echo 'selected="selected"'; ?>>2009</option>



                                                                <option value="2008" <?php if ($RegistrationYear == "2008") echo 'selected="selected"'; ?>>2008</option>



                                                                <option value="2007" <?php if ($RegistrationYear == "2007") echo 'selected="selected"'; ?>>2007</option>



                                                                <option value="2006" <?php if ($RegistrationYear == "2006") echo 'selected="selected"'; ?>>2006</option>



                                                                <option value="2005" <?php if ($RegistrationYear == "2005") echo 'selected="selected"'; ?>>2005</option>



                                                                <option value="2004" <?php if ($RegistrationYear == "2004") echo 'selected="selected"'; ?>>2004</option>



                                                                <option value="2003" <?php if ($RegistrationYear == "2003") echo 'selected="selected"'; ?>>2003</option>



                                                                <option value="2002" <?php if ($RegistrationYear == "2002") echo 'selected="selected"'; ?>>2002</option>



                                                                <option value="2001" <?php if ($RegistrationYear == "2001") echo 'selected="selected"'; ?>>2001</option>



                                                                <option value="2000" <?php if ($RegistrationYear == "2000") echo 'selected="selected"'; ?>>2000</option>



                                                                <option value="1999" <?php if ($RegistrationYear == "1999") echo 'selected="selected"'; ?>>1999</option>



                                                                <option value="1998" <?php if ($RegistrationYear == "1998") echo 'selected="selected"'; ?>>1998</option>



                                                                <option value="1997" <?php if ($RegistrationYear == "1997") echo 'selected="selected"'; ?>>1997</option>



                                                                <option value="1996" <?php if ($RegistrationYear == "1996") echo 'selected="selected"'; ?>>1996</option>



                                                                <option value="1995" <?php if ($RegistrationYear == "1995") echo 'selected="selected"'; ?>>1995</option>



                                                                <option value="1994" <?php if ($RegistrationYear == "1994") echo 'selected="selected"'; ?>>1994</option>



                                                                <option value="1993" <?php if ($RegistrationYear == "1993") echo 'selected="selected"'; ?>>1993</option>



                                                                <option value="1992" <?php if ($RegistrationYear == "1992") echo 'selected="selected"'; ?>>1992</option>



                                                                <option value="1991" <?php if ($RegistrationYear == "1991") echo 'selected="selected"'; ?>>1991</option>



                                                                <option value="1990" <?php if ($RegistrationYear == "1990") echo 'selected="selected"'; ?>>1990</option>



                                                                <option value="1989" <?php if ($RegistrationYear == "1989") echo 'selected="selected"'; ?>>1989</option>



                                                                <option value="1988" <?php if ($RegistrationYear == "1988") echo 'selected="selected"'; ?>>1988</option>



                                                                <option value="1987" <?php if ($RegistrationYear == "1987") echo 'selected="selected"'; ?>>1987</option>



                                                                <option value="1986" <?php if ($RegistrationYear == "1986") echo 'selected="selected"'; ?>>1986</option>



                                                                <option value="1985" <?php if ($RegistrationYear == "1985") echo 'selected="selected"'; ?>>1985</option>



                                                                <option value="1984" <?php if ($RegistrationYear == "1984") echo 'selected="selected"'; ?>>1984</option>



                                                                <option value="1983" <?php if ($RegistrationYear == "1983") echo 'selected="selected"'; ?>>1983</option>



                                                                <option value="1982" <?php if ($RegistrationYear == "1982") echo 'selected="selected"'; ?>>1982</option>



                                                                <option value="1981" <?php if ($RegistrationYear == "1981") echo 'selected="selected"'; ?>>1981</option>



                                                                <option value="1980" <?php if ($RegistrationYear == "2021") echo 'selected="selected"'; ?>>1980</option>



                                                                <option value="1979" <?php if ($RegistrationYear == "1979") echo 'selected="selected"'; ?>>1979</option>



                                                                <option value="1978" <?php if ($RegistrationYear == "1978") echo 'selected="selected"'; ?>>1978</option>



                                                                <option value="1977" <?php if ($RegistrationYear == "1977") echo 'selected="selected"'; ?>>1977</option>



                                                                <option value="1976" <?php if ($RegistrationYear == "1976") echo 'selected="selected"'; ?>>1976</option>



                                                                <option value="1975" <?php if ($RegistrationYear == "1975") echo 'selected="selected"'; ?>>1975</option>



                                                                <option value="1974" <?php if ($RegistrationYear == "1974") echo 'selected="selected"'; ?>>1974</option>



                                                                <option value="1973" <?php if ($RegistrationYear == "1973") echo 'selected="selected"'; ?>>1973</option>



                                                                <option value="1972" <?php if ($RegistrationYear == "1971") echo 'selected="selected"'; ?>>1972</option>



                                                                <option value="1971" <?php if ($RegistrationYear == "1971") echo 'selected="selected"'; ?>>1971</option>



                                                                <option value="1970" <?php if ($RegistrationYear == "1970") echo 'selected="selected"'; ?>>1970</option>



                                                                <option value="1969" <?php if ($RegistrationYear == "1969") echo 'selected="selected"'; ?>>1969</option>



                                                                <option value="1968" <?php if ($RegistrationYear == "2021") echo 'selected="selected"'; ?>>1968</option>



                                                                <option value="1967" <?php if ($RegistrationYear == "1967") echo 'selected="selected"'; ?>>1967</option>



                                                                <option value="1966" <?php if ($RegistrationYear == "1966") echo 'selected="selected"'; ?>>1966</option>



                                                                <option value="1965" <?php if ($RegistrationYear == "1965") echo 'selected="selected"'; ?>>1965</option>



                                                                <option value="1964" <?php if ($RegistrationYear == "1964") echo 'selected="selected"'; ?>>1964</option>



                                                                <option value="1963" <?php if ($RegistrationYear == "1963") echo 'selected="selected"'; ?>>1963</option>



                                                                <option value="1962" <?php if ($RegistrationYear == "1962") echo 'selected="selected"'; ?>>1962</option>



                                                                <option value="1961" <?php if ($RegistrationYear == "1961") echo 'selected="selected"'; ?>>1961</option>



                                                                <option value="1960" <?php if ($RegistrationYear == "1960") echo 'selected="selected"'; ?>>1960</option>



                                                                <option value="1959" <?php if ($RegistrationYear == "1959") echo 'selected="selected"'; ?>>1959</option>



                                                                <option value="1958" <?php if ($RegistrationYear == "1958") echo 'selected="selected"'; ?>>1958</option>



                                                                <option value="1957" <?php if ($RegistrationYear == "1957") echo 'selected="selected"'; ?>>1957</option>



                                                                <option value="1956" <?php if ($RegistrationYear == "1956") echo 'selected="selected"'; ?>>1956</option>



                                                                <option value="1955" <?php if ($RegistrationYear == "1955") echo 'selected="selected"'; ?>>1955</option>



                                                                <option value="1954" <?php if ($RegistrationYear == "1954") echo 'selected="selected"'; ?>>1954</option>



                                                                <option value="1953" <?php if ($RegistrationYear == "1953") echo 'selected="selected"'; ?>>1953</option>



                                                                <option value="1952" <?php if ($RegistrationYear == "1952") echo 'selected="selected"'; ?>>1952</option>



                                                                <option value="1951" <?php if ($RegistrationYear == "1951") echo 'selected="selected"'; ?>>1951</option>



                                                                <option value="1950" <?php if ($RegistrationYear == "1950") echo 'selected="selected"'; ?>>1950</option>

                                                            </select>
                                                            <label for="RegistrationYear">Registration Year *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="RegistrationMonth" name="RegistrationMonth" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="1" <?php if ($RegistrationMonth == "1") echo 'selected="selected"'; ?>>1</option>



                                                                <option value="2" <?php if ($RegistrationMonth == "2") echo 'selected="selected"'; ?>>2</option>



                                                                <option value="3" <?php if ($RegistrationMonth == "3") echo 'selected="selected"'; ?>>3</option>



                                                                <option value="4" <?php if ($RegistrationMonth == "4") echo 'selected="selected"'; ?>>4</option>



                                                                <option value="5" <?php if ($RegistrationMonth == "5") echo 'selected="selected"'; ?>>5</option>



                                                                <option value="6" <?php if ($RegistrationMonth == "6") echo 'selected="selected"'; ?>>6</option>



                                                                <option value="7" <?php if ($RegistrationMonth == "7") echo 'selected="selected"'; ?>>7</option>



                                                                <option value="8" <?php if ($RegistrationMonth == "8") echo 'selected="selected"'; ?>>8</option>


                                                                <option value="9" <?php if ($RegistrationMonth == "9") echo 'selected="selected"'; ?>>9</option>


                                                                <option value="10" <?php if ($RegistrationMonth == "10") echo 'selected="selected"'; ?>>10</option>



                                                                <option value="11" <?php if ($RegistrationMonth == "11") echo 'selected="selected"'; ?>>11</option>



                                                                <option value="12" <?php if ($RegistrationMonth == "12") echo 'selected="selected"'; ?>>12</option>

                                                            </select>
                                                            <label for="RegistrationYear">Registration Month *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="ManufactureYear" name="ManufactureYear" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <option value="2021" <?php if ($ManufactureYear == "2021") echo 'selected="selected"'; ?>>2021</option>
                                                                <option value="2020" <?php if ($ManufactureYear == "2020") echo 'selected="selected"'; ?>>2020</option>
                                                                <option value="2019" <?php if ($ManufactureYear == "2019") echo 'selected="selected"'; ?>>2019</option>

                                                                <option value="2018" <?php if ($ManufactureYear == "2018") echo 'selected="selected"'; ?>>2018</option>



                                                                <option value="2017" <?php if ($ManufactureYear == "2017") echo 'selected="selected"'; ?>>2017</option>



                                                                <option value="2016" <?php if ($ManufactureYear == "2016") echo 'selected="selected"'; ?>>2016</option>



                                                                <option value="2015" <?php if ($ManufactureYear == "2015") echo 'selected="selected"'; ?>>2015</option>



                                                                <option value="2014" <?php if ($ManufactureYear == "2014") echo 'selected="selected"'; ?>>2014</option>



                                                                <option value="2013" <?php if ($ManufactureYear == "2013") echo 'selected="selected"'; ?>>2013</option>



                                                                <option value="2012" <?php if ($ManufactureYear == "2012") echo 'selected="selected"'; ?>>2012</option>



                                                                <option value="2011" <?php if ($ManufactureYear == "2011") echo 'selected="selected"'; ?>>2011</option>



                                                                <option value="2010" <?php if ($ManufactureYear == "2010") echo 'selected="selected"'; ?>>2010</option>



                                                                <option value="2009" <?php if ($ManufactureYear == "2009") echo 'selected="selected"'; ?>>2009</option>



                                                                <option value="2008" <?php if ($ManufactureYear == "2008") echo 'selected="selected"'; ?>>2008</option>



                                                                <option value="2007" <?php if ($ManufactureYear == "2007") echo 'selected="selected"'; ?>>2007</option>



                                                                <option value="2006" <?php if ($ManufactureYear == "2006") echo 'selected="selected"'; ?>>2006</option>



                                                                <option value="2005" <?php if ($ManufactureYear == "2005") echo 'selected="selected"'; ?>>2005</option>



                                                                <option value="2004" <?php if ($ManufactureYear == "2004") echo 'selected="selected"'; ?>>2004</option>



                                                                <option value="2003" <?php if ($ManufactureYear == "2003") echo 'selected="selected"'; ?>>2003</option>



                                                                <option value="2002" <?php if ($ManufactureYear == "2002") echo 'selected="selected"'; ?>>2002</option>



                                                                <option value="2001" <?php if ($ManufactureYear == "2001") echo 'selected="selected"'; ?>>2001</option>



                                                                <option value="2000" <?php if ($ManufactureYear == "2000") echo 'selected="selected"'; ?>>2000</option>



                                                                <option value="1999" <?php if ($ManufactureYear == "1999") echo 'selected="selected"'; ?>>1999</option>



                                                                <option value="1998" <?php if ($ManufactureYear == "1998") echo 'selected="selected"'; ?>>1998</option>



                                                                <option value="1997" <?php if ($ManufactureYear == "1997") echo 'selected="selected"'; ?>>1997</option>



                                                                <option value="1996" <?php if ($ManufactureYear == "1996") echo 'selected="selected"'; ?>>1996</option>



                                                                <option value="1995" <?php if ($ManufactureYear == "1995") echo 'selected="selected"'; ?>>1995</option>



                                                                <option value="1994" <?php if ($ManufactureYear == "1994") echo 'selected="selected"'; ?>>1994</option>



                                                                <option value="1993" <?php if ($ManufactureYear == "1993") echo 'selected="selected"'; ?>>1993</option>



                                                                <option value="1992" <?php if ($ManufactureYear == "1992") echo 'selected="selected"'; ?>>1992</option>



                                                                <option value="1991" <?php if ($ManufactureYear == "1991") echo 'selected="selected"'; ?>>1991</option>



                                                                <option value="1990" <?php if ($ManufactureYear == "1990") echo 'selected="selected"'; ?>>1990</option>



                                                                <option value="1989" <?php if ($ManufactureYear == "1989") echo 'selected="selected"'; ?>>1989</option>



                                                                <option value="1988" <?php if ($ManufactureYear == "1988") echo 'selected="selected"'; ?>>1988</option>



                                                                <option value="1987" <?php if ($ManufactureYear == "1987") echo 'selected="selected"'; ?>>1987</option>



                                                                <option value="1986" <?php if ($ManufactureYear == "1986") echo 'selected="selected"'; ?>>1986</option>



                                                                <option value="1985" <?php if ($ManufactureYear == "1985") echo 'selected="selected"'; ?>>1985</option>



                                                                <option value="1984" <?php if ($ManufactureYear == "1984") echo 'selected="selected"'; ?>>1984</option>



                                                                <option value="1983" <?php if ($ManufactureYear == "1983") echo 'selected="selected"'; ?>>1983</option>



                                                                <option value="1982" <?php if ($ManufactureYear == "1982") echo 'selected="selected"'; ?>>1982</option>



                                                                <option value="1981" <?php if ($ManufactureYear == "1981") echo 'selected="selected"'; ?>>1981</option>



                                                                <option value="1980" <?php if ($ManufactureYear == "2021") echo 'selected="selected"'; ?>>1980</option>



                                                                <option value="1979" <?php if ($ManufactureYear == "1979") echo 'selected="selected"'; ?>>1979</option>



                                                                <option value="1978" <?php if ($ManufactureYear == "1978") echo 'selected="selected"'; ?>>1978</option>



                                                                <option value="1977" <?php if ($ManufactureYear == "1977") echo 'selected="selected"'; ?>>1977</option>



                                                                <option value="1976" <?php if ($ManufactureYear == "1976") echo 'selected="selected"'; ?>>1976</option>



                                                                <option value="1975" <?php if ($ManufactureYear == "1975") echo 'selected="selected"'; ?>>1975</option>



                                                                <option value="1974" <?php if ($ManufactureYear == "1974") echo 'selected="selected"'; ?>>1974</option>



                                                                <option value="1973" <?php if ($ManufactureYear == "1973") echo 'selected="selected"'; ?>>1973</option>



                                                                <option value="1972" <?php if ($ManufactureYear == "1971") echo 'selected="selected"'; ?>>1972</option>



                                                                <option value="1971" <?php if ($ManufactureYear == "1971") echo 'selected="selected"'; ?>>1971</option>



                                                                <option value="1970" <?php if ($ManufactureYear == "1970") echo 'selected="selected"'; ?>>1970</option>



                                                                <option value="1969" <?php if ($ManufactureYear == "1969") echo 'selected="selected"'; ?>>1969</option>



                                                                <option value="1968" <?php if ($ManufactureYear == "2021") echo 'selected="selected"'; ?>>1968</option>



                                                                <option value="1967" <?php if ($ManufactureYear == "1967") echo 'selected="selected"'; ?>>1967</option>



                                                                <option value="1966" <?php if ($ManufactureYear == "1966") echo 'selected="selected"'; ?>>1966</option>



                                                                <option value="1965" <?php if ($ManufactureYear == "1965") echo 'selected="selected"'; ?>>1965</option>



                                                                <option value="1964" <?php if ($ManufactureYear == "1964") echo 'selected="selected"'; ?>>1964</option>



                                                                <option value="1963" <?php if ($ManufactureYear == "1963") echo 'selected="selected"'; ?>>1963</option>



                                                                <option value="1962" <?php if ($ManufactureYear == "1962") echo 'selected="selected"'; ?>>1962</option>



                                                                <option value="1961" <?php if ($ManufactureYear == "1961") echo 'selected="selected"'; ?>>1961</option>



                                                                <option value="1960" <?php if ($ManufactureYear == "1960") echo 'selected="selected"'; ?>>1960</option>



                                                                <option value="1959" <?php if ($ManufactureYear == "1959") echo 'selected="selected"'; ?>>1959</option>



                                                                <option value="1958" <?php if ($ManufactureYear == "1958") echo 'selected="selected"'; ?>>1958</option>



                                                                <option value="1957" <?php if ($ManufactureYear == "1957") echo 'selected="selected"'; ?>>1957</option>



                                                                <option value="1956" <?php if ($ManufactureYear == "1956") echo 'selected="selected"'; ?>>1956</option>



                                                                <option value="1955" <?php if ($ManufactureYear == "1955") echo 'selected="selected"'; ?>>1955</option>



                                                                <option value="1954" <?php if ($ManufactureYear == "1954") echo 'selected="selected"'; ?>>1954</option>



                                                                <option value="1953" <?php if ($ManufactureYear == "1953") echo 'selected="selected"'; ?>>1953</option>



                                                                <option value="1952" <?php if ($ManufactureYear == "1952") echo 'selected="selected"'; ?>>1952</option>



                                                                <option value="1951" <?php if ($ManufactureYear == "1951") echo 'selected="selected"'; ?>>1951</option>



                                                                <option value="1950" <?php if ($ManufactureYear == "1950") echo 'selected="selected"'; ?>>1950</option>

                                                            </select>
                                                            <label for="RegistrationYear">Manufacture Year *</label>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="ManufactureMonth" name="ManufactureMonth" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="1" <?php if ($ManufactureMonth == "1") echo 'selected="selected"'; ?>>1</option>



                                                                <option value="2" <?php if ($ManufactureMonth == "2") echo 'selected="selected"'; ?>>2</option>



                                                                <option value="3" <?php if ($ManufactureMonth == "3") echo 'selected="selected"'; ?>>3</option>



                                                                <option value="4" <?php if ($ManufactureMonth == "4") echo 'selected="selected"'; ?>>4</option>



                                                                <option value="5" <?php if ($ManufactureMonth == "5") echo 'selected="selected"'; ?>>5</option>



                                                                <option value="6" <?php if ($ManufactureMonth == "6") echo 'selected="selected"'; ?>>6</option>



                                                                <option value="7" <?php if ($ManufactureMonth == "7") echo 'selected="selected"'; ?>>7</option>



                                                                <option value="8" <?php if ($ManufactureMonth == "8") echo 'selected="selected"'; ?>>8</option>


                                                                <option value="9" <?php if ($ManufactureMonth == "9") echo 'selected="selected"'; ?>>9</option>


                                                                <option value="10" <?php if ($ManufactureMonth == "10") echo 'selected="selected"'; ?>>10</option>



                                                                <option value="11" <?php if ($ManufactureMonth == "11") echo 'selected="selected"'; ?>>11</option>



                                                                <option value="12" <?php if ($ManufactureMonth == "12") echo 'selected="selected"'; ?>>12</option>

                                                            </select>
                                                            <label for="ManufactureMonth">Manufacture Month *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Ext_Color" name="Ext_Color" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters allowed" value="<?= $Ext_Color; ?>">
                                                            <label for="Ext_Color">
                                                                Ext. Color
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="WheelDrive" name="WheelDrive" maxlength="20" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 20 characters allowed" value="<?= $WheelDrive; ?>">
                                                            <label for="WheelDrive">
                                                                Wheel Drive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">


                                                        <div class="form-group">
                                                            <select id="Location" name="Location" class="form-control select2-list" required="true">
                                                                <option value=""></option>

                                                                <option value="Dubai" <?php if ($Location == "Dubai") echo 'selected="selected"'; ?>>Dubai</option>



                                                                <option value="Japan" <?php if ($Location == "Japan") echo 'selected="selected"'; ?>>Japan</option>



                                                                <option value="Thailand" <?php if ($Location == "Thailand") echo 'selected="selected"'; ?>>Thailand</option>

                                                            </select>
                                                            <label for="Location">Location *</label>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Dimension" name="Dimension" maxlength="100" data-toggle="Dimension" data-placement="Dimension" data-trigger="hover" data-original-title="Maximum 100 characters allowed" value="<?= $Dimension; ?>">
                                                            <label for="Dimension">
                                                                Dimension
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="Doors" name="Doors" max="30" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 3 digit allowed. Format Doors is : 3, 5 etc" value="<?= $Doors; ?>">
                                                            <label for="Doors">
                                                                Doors
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="M3" name="M3" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 10 digit allowed Format M3 is : 7.624" value="<?= $M3; ?>">
                                                            <label for="M3">
                                                                M3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="Seats" name="Seats" max="200" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 3 digit allowed. Format Seats is : 2 , 5 etc" value="<?= $Seats; ?>">
                                                            <label for="Seats">
                                                                Seats
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Weight" name="Weight" maxlength="20" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 20 characters are allowed. Format Seats is : 740 etc" value="<?= $Weight; ?>">
                                                            <label for="Weight">
                                                                Weight
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="country" name="country[]" class="form-control select2-list" multiple="multiple">



                                                            </select>
                                                            <label for="country">Country Name</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="car_tag" name="car_tag" class="form-control">
                                                                <option value=""></option>


                                                                <option value="1" <?php if ($car_tag == "1") echo 'selected="selected"'; ?>>Discounted</option>
                                                                <option value="2" <?php if ($car_tag == "2") echo 'selected="selected"'; ?>>Clearance Sale</option>

                                                            </select>
                                                            <label for="car_tag">Car Tag </label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="cardisprice" name="cardisprice" max="99999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 5 digit allowed Format Price is : $65000" value="<?= $cardisprice; ?>">
                                                            <label for="Car Discount Price">
                                                                Car Discount Price
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <br>
                                                <h3>Car SEO Section:</h3>


                                                <div class="row">



                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="Title" name="Title" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Title; ?></textarea>
                                                            <label for="Title">
                                                                Title
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="Keywords" name="Keywords" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Keywords; ?></textarea>
                                                            <label for="Keywords">
                                                                Keywords
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="Description" name="Description" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Description; ?></textarea>
                                                            <label for="Description">
                                                                Description
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>




                                            </form>


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h5>Attached Car Detail Images</h5>
                                                    <table class="table table-responsive table-condensed table-striped">
                                                        <tbody id="tbl_files">
                                                            <?php
                                                            if (isset($files_list) && count($files_list) > 0) {
                                                                foreach ($files_list as $fl) {
                                                            ?>
                                                                    <tr>
                                                                        <td style="width: 20%;"><button name="btn_delete_file" data="<?= $car_d_id; ?>" stored_file_name="<?= $fl['stored_file_name']; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td>
                                                                        <td style="width: 80%;"><a href="https://www.asiahilux.com/uploads/" <?= $fl['stored_file_name']; ?> target="_blank"><?= $fl['user_file_name'] ?></a></td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-md-6">
                                                    <h5>Attached Featured Image</h5>
                                                    <table class="table table-responsive table-condensed table-striped">
                                                        <tbody id="tbl_files_featured">
                                                            <?php
                                                            if (isset($files_list) && count($files_list) > 0) {
                                                                foreach ($files_list as $fl) {
                                                            ?>
                                                                    <tr>
                                                                        <td style="width: 20%;"><button name="btn_delete_file_carfeatured" data="<?= $car_d_id; ?>" stored_file_name="<?= $fl['stored_file_name']; ?>" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td>
                                                                        <td style="width: 80%;"><a href="https://www.asiahilux.com/uploads/" <?= $fl['stored_file_name']; ?> target="_blank"><?= $fl['user_file_name'] ?></a></td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button id="btn_show_attach" class="btn btn-default btn-raised">Upload Car Deatail Images</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <button id="btn_show_attach_carfeatured" class="btn btn-default btn-raised">Upload Car Featured Image</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end .card-body -->
                                        <div class="card-actionbar">
                                            <div class="card-actionbar-row">
                                                <button id="btn_save" type="button" class="btn btn-primary btn-raised btn-loading-state" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">Save Car Details</button>
                                            </div>

                                        </div>
                                        <!--end .card-actionbar -->

                                    </div>

                                </div>
                                <!--end .panel -->


                            </div>
                            <!--end .col -->
                        </div> <!-- end .row-->

                        <div class="modal fade" id="myModal-upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Upload Car Detail Images</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card col-md-12">
                                                <div class="card-head style-primary">
                                                    <header>Drag images or drop here to upload</header>
                                                </div>
                                                <div class="card-body no-padding">
                                                    <form action="<?php echo base_url() . 'index.php/'; ?>car_detail/upload_attachment" class="dropzone dz-clickable" id="my-awesome-dropzone">
                                                        <input type="hidden" id="car_d_id2" name="car_d_id2" value="<?= $car_d_id ?>" />
                                                        <div class="dz-message">
                                                            <h3>Drop images here or click to upload.</h3>
                                                            <em>(Max file size 3MB and Format are allowed is jpg | png | jpeg .)</em>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal-upload_carfeatured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Upload Car Featured Image</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="card col-md-12">
                                                <div class="card-head style-primary">
                                                    <header>Drag images or drop here to upload</header>
                                                </div>
                                                <div class="card-body no-padding">
                                                    <form action="<?php echo base_url() . 'index.php/'; ?>car_detail/upload_attachment_featured_Image_add" class="dropzone dz-clickable" id="my-awesome-dropzone_1">
                                                        <input type="hidden" id="car_d_id2" name="car_d_id2" value="<?= $car_d_id ?>" />
                                                        <div class="dz-message">
                                                            <h3>Drop images here or click to upload.</h3>
                                                            <em>(Max file size 5MB and Format are allowed is jpg | png | jpeg .)</em>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include('include/footer.php'); ?>
                    <script src="<?= base_url(); ?>assets/js/libs/dropzone/dropzone.min.js"></script>
                    <script type="text/javascript">
                        $('.select2-list').select2();

                        populate_Bodytype_Dropdown();
                        populate_countryList_Dropdown();


                        $("#my-awesome-dropzone").dropzone();

                        $(window).on("beforeunload", function() {
                            return "Are you sure? You didn't finish work!";
                        });

                        $("#my-awesome-dropzone_1").dropzone();

                        $(window).on("beforeunload", function() {
                            return "Are you sure? You didn't finish work!";
                        });

                        $(window).unload(function() {

                            var entry_name = $("#entry_name").val();
                            if (entry_name == "temporary_entry") {
                                var formdata_d = {
                                    'car_d_id': $('#car_d_id').val()
                                }
                                url = "<?= base_url() . 'index.php/'; ?>car_detail/delete_temporary";
                                SendDataByAjax3(
                                    url, formdata_d,
                                    function(result) {
                                        var result_array = JSON.parse(result);
                                        if (result_array.res) {
                                            console.log("Temporary car detail is deleted");
                                        } else {
                                            console.log(result_array.msg);
                                        }
                                    }
                                );
                            }
                        });



                        function populate_Bodytype_Dropdown() {
                            var url = "<?= base_url() . 'index.php/'; ?>Car_detail/select_bodytype";
                            var bodytype = "<?= $Bodytype; ?>";
                            $('#bodytype').empty();
                            $('#bodytype').append('<option value=""></option>');
                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {
                                    for (j = 0; j < field.length; j++) {
                                        var tag = "";
                                        if (bodytype == field[j].bodytype_id) {
                                            tag = 'selected';
                                        }

                                        $('#bodytype').append('<option value = "' + field[j].bodytype_id + '" ' + tag + '>' + field[j].bodytype_name + '</option>');

                                        tag = "";
                                    }
                                    $('#bodytype').change();
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session has been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {

                                    alert("No connection available.");
                                } else {

                                    alert(xhr.responseText);
                                }
                            });
                        }





                        function populate_countryList_Dropdown() {
                            var url = "<?= base_url() . 'index.php/'; ?>Car_detail/select_countryList";
                            var country = "<?= $Country; ?>";
                            $('#country').empty();
                            $('#country').append('<option value=""></option>');
                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {
                                    for (j = 0; j < field.length; j++) {
                                        var tag = "";
                                        if (country == field[j].country_id) {
                                            tag = 'selected';
                                        }

                                        $('#country').append('<option value = "' + field[j].country_id + '" ' + tag + '>' + field[j].country_name + '</option>');

                                        tag = "";
                                    }
                                    $('#country').change();
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session has been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {

                                    alert("No connection available.");
                                } else {

                                    alert(xhr.responseText);
                                }
                            });
                        }

                        populate_CarManufacturer_Dropdown();
                        load_attached_files();
                        load_attached_files_carfeatured();




                        function populate_CarManufacturer_Dropdown() {
                            var url = "<?= base_url() . 'index.php/'; ?>car_manufacturer/select_active";
                            var vm_id = "<?= $vm_id ?>";
                            $('#vm_id').empty();
                            $('#vm_id').append('<option value=""></option>');
                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {
                                    for (j = 0; j < field.length; j++) {
                                        var tag = "";
                                        if (vm_id == field[j].vm_id) {
                                            tag = 'selected';
                                        }

                                        $('#vm_id').append('<option value = "' + field[j].vm_id + '" ' + tag + '>' + field[j].vm_name + '</option>');


                                    }
                                    $('#vm_id').change();
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session has been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {

                                    alert("No connection available.");
                                } else {

                                    alert(xhr.responseText);
                                }
                            });
                        }


                        function populate_CarModel_Dropdown(vm_id) {
                            $('#m_id').empty();
                            var url = "<?= base_url() . 'index.php/'; ?>car_model/select_by_vm_id/" + vm_id;
                            var m_id = "<?= $m_id ?>";
                            $('#m_id').empty();
                            $('#m_id').append('<option value=""></option>');
                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {
                                    for (j = 0; j < field.length; j++) {
                                        var tag = "";
                                        if (m_id == field[j].m_id) {
                                            tag = "selected";
                                        }

                                        $('#m_id').append('<option value = "' + field[j].m_id + '" ' + tag + '>' + field[j].model_name + '</option>');


                                    }
                                    $('#m_id').change();
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session has been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {

                                    alert("No connection available.");
                                } else {

                                    alert(xhr.responseText);
                                }
                            });
                        }

                        $("#vm_id").change(function() {

                            if ($(this).val() == "") {
                                $('#m_id').empty();
                            } else {

                                id = $(this).val();
                                populate_CarModel_Dropdown(id);
                            }

                        });


                        function save_car_details(button_name) {
                            var form = $("#myform");
                            var res = form.valid();

                            if (res) {
                                var rows_count1 = $('#bodytype :selected').length;
                                if (res && rows_count1 > 0) {
                                    var json_string = "[";
                                    var row = 1;

                                    $('#bodytype :selected').each(function(i, selected) {
                                        json_string += "{";
                                        var bodytype = $(selected).val();
                                        json_string += '"bodytype":"' + bodytype + '"';
                                        if (row < rows_count1) {
                                            json_string += '},';
                                        } else {
                                            json_string += '}';
                                        }
                                        row += 1;
                                    });
                                }
                                json_string += ']';



                                var rows_count_country = $('#country :selected').length;
                                if (res && rows_count_country > 0) {
                                    var json_string_country = "[";
                                    var row_country = 1;
                                    $('#country :selected').each(function(i, selected) {

                                        json_string_country += "{";

                                        var country = $(selected).val();

                                        json_string_country += '"countryid":"' + country + '"';

                                        if (row_country < rows_count_country) {
                                            json_string_country += '},';
                                        } else {
                                            json_string_country += '}';
                                        }
                                        row_country += 1;
                                    });

                                }
                                json_string_country += ']';

                                var CDPlayerstatus = "";

                                if ($("#CDPlayer").is(':checked')) {
                                    CDPlayerstatus = "1";
                                } else {
                                    CDPlayerstatus = "0";
                                }

                                var SunRoofstatus = "";

                                if ($("#SunRoof").is(':checked')) {
                                    SunRoofstatus = "1";
                                } else {
                                    SunRoofstatus = "0";
                                }

                                var LeatherSeatstatus = "";

                                if ($("#LeatherSeat").is(':checked')) {
                                    LeatherSeatstatus = "1";
                                } else {
                                    LeatherSeatstatus = "0";
                                }

                                var AlloyWheelsstatus = "";

                                if ($("#AlloyWheels").is(':checked')) {
                                    AlloyWheelsstatus = "1";
                                } else {
                                    AlloyWheelsstatus = "0";
                                }
                                var PowerSteeringstatus = "";

                                if ($("#PowerSteering").is(':checked')) {
                                    PowerSteeringstatus = "1";
                                } else {
                                    PowerSteeringstatus = "0";
                                }
                                var PowerWindowstatus = "";

                                if ($("#PowerWindow").is(':checked')) {
                                    PowerWindowstatus = "1";
                                } else {
                                    PowerWindowstatus = "0";
                                }

                                var ACstatus = "";

                                if ($("#AC").is(':checked')) {
                                    ACstatus = "1";
                                } else {
                                    ACstatus = "0";
                                }

                                var ABSstatus = "";

                                if ($("#ABS").is(':checked')) {
                                    ABSstatus = "1";
                                } else {
                                    ABSstatus = "0";
                                }

                                var Airbagstatus = "";

                                if ($("#Airbag").is(':checked')) {
                                    Airbagstatus = "1";
                                } else {
                                    Airbagstatus = "0";
                                }

                                var Radiostatus = "";

                                if ($("#Radio").is(':checked')) {
                                    Radiostatus = "1";
                                } else {
                                    Radiostatus = "0";
                                }

                                var CDChangerstatus = "";

                                if ($("#CDChanger").is(':checked')) {
                                    CDChangerstatus = "1";
                                } else {
                                    CDChangerstatus = "0";
                                }
                                var DVDstatus = "";

                                if ($("#DVD").is(':checked')) {
                                    DVDstatus = "1";
                                } else {
                                    DVDstatus = "0";
                                }

                                var TVstatus = "";

                                if ($("#TV").is(':checked')) {
                                    TVstatus = "1";
                                } else {
                                    TVstatus = "0";
                                }

                                var PoweSeatstatus = "";

                                if ($("#PoweSeat").is(':checked')) {
                                    PoweSeatstatus = "1";
                                } else {
                                    PoweSeatstatus = "0";
                                }
                                var BackTirestatus = "";

                                if ($("#BackTire").is(':checked')) {
                                    BackTirestatus = "1";
                                } else {
                                    BackTirestatus = "0";
                                }
                                var GrillGuardstatus = "";

                                if ($("#GrillGuard").is(':checked')) {
                                    GrillGuardstatus = "1";
                                } else {
                                    GrillGuardstatus = "0";
                                }
                                var RearSpoilerstatus = "";

                                if ($("#RearSpoiler").is(':checked')) {
                                    RearSpoilerstatus = "1";
                                } else {
                                    RearSpoilerstatus = "0";
                                }
                                var CentralLockingstatus = "";

                                if ($("#CentralLocking").is(':checked')) {
                                    CentralLockingstatus = "1";
                                } else {
                                    CentralLockingstatus = "0";
                                }
                                var Jackstatus = "";

                                if ($("#Jack").is(':checked')) {
                                    Jackstatus = "1";
                                } else {
                                    Jackstatus = "0";
                                }
                                var SpareTirestatus = "";

                                if ($("#SpareTire").is(':checked')) {
                                    SpareTirestatus = "1";
                                } else {
                                    SpareTirestatus = "0";
                                }
                                var WheelSpannerstatus = "";

                                if ($("#WheelSpanner").is(':checked')) {
                                    WheelSpannerstatus = "1";
                                } else {
                                    WheelSpannerstatus = "0";
                                }






                                var formdata = {

                                    'car_d_id': $("#car_d_id").val(),
                                    'vm_id': $("#vm_id").val(),
                                    'm_id': $("#m_id").val(),
                                    'carname': $("#carname").val(),
                                    'CDPlayer': CDPlayerstatus,
                                    'SunRoof': SunRoofstatus,
                                    'LeatherSeat': LeatherSeatstatus,
                                    'AlloyWheels': AlloyWheelsstatus,
                                    'PowerSteering': PowerSteeringstatus,
                                    'PowerWindow': PowerWindowstatus,
                                    'AC': ACstatus,
                                    'ABS': ABSstatus,
                                    'Airbag': Airbagstatus,
                                    'Radio': Radiostatus,
                                    'CDChanger': CDChangerstatus,
                                    'DVD': DVDstatus,
                                    'TV': TVstatus,
                                    'PoweSeat': PoweSeatstatus,
                                    'BackTire': BackTirestatus,
                                    'GrillGuard': GrillGuardstatus,
                                    'RearSpoiler': RearSpoilerstatus,
                                    'CentralLocking': CentralLockingstatus,
                                    'Jack': Jackstatus,
                                    'SpareTire': SpareTirestatus,
                                    'WheelSpanner': WheelSpannerstatus,
                                    'carprice': $("#carprice").val(),
                                    'Fuel': $("#fuel").val(),
                                    'Transmission': $("#transmission").val(),
                                    'Steering': $("#steering").val(),
                                    'VehicleNo': $("#VehicleNo").val(),
                                    'Chassis': $("#Chassis").val(),
                                    'ModelCode': $("#ModelCode").val(),
                                    'VersionClass': $("#VersionClass").val(),
                                    'EngineCode': $("#EngineCode").val(),
                                    'Mileage': $("#Mileage").val(),
                                    'EngineSize': $("#EngineSize").val(),
                                    'RegistrationYear': $("#RegistrationYear").val(),
                                    'RegistrationMonth': $("#RegistrationMonth").val(),
                                    'ManufactureYear': $("#ManufactureYear").val(),
                                    'ManufactureMonth': $("#ManufactureMonth").val(),
                                    'Ext_Color': $("#Ext_Color").val(),
                                    'WheelDrive': $("#WheelDrive").val(),
                                    'Location': $("#Location").val(),
                                    'Dimension': $("#Dimension").val(),
                                    'Doors': $("#Doors").val(),
                                    'M3': $("#M3").val(),
                                    'Seats': $("#Seats").val(),
                                    'Weight': $("#Weight").val(),
                                    'car_tag': $("#car_tag").val(),
                                    'cardisprice': $("#cardisprice").val(),
                                    'Title': $("#Title").val(),
                                    'Keywords': $("#Keywords").val(),
                                    'Description': $("#Description").val(),
                                    'Bodytype': json_string,
                                    'country_id': json_string_country

                                }


                                url = "<?= base_url() . 'index.php/'; ?>car_detail/create";

                                ///////
                                $("#" + button_name).button('loading');

                                $("#msg-error").hide();

                                SendDataByAjax3(
                                    url, formdata,
                                    function(result) {
                                        var result_array = JSON.parse(result);

                                        $("#" + button_name).button('reset');
                                        window.scroll(0, 0);
                                        if (result_array.res) {
                                            toastr.success('Record Saved', 'Successful');
                                            window.location.reload();

                                        } else {

                                            if (result_array.status == "404") {
                                                alert("Your login session has been expired. Please login again.");
                                                GrillGuard.reload();
                                            } else if (result_array.status == "403") {
                                                alert("You don't have permission to perform this action.");
                                                GrillGuard.reload();
                                            } else if (result_array.status == "500") {
                                                $("#msg-error").children('div').html(result_array.msg);
                                                $("#msg-error").show();
                                            } else {
                                                $("#msg-error").children('div').html(result_array.msg);
                                                $("#msg-error").show();
                                            }
                                        }
                                    }
                                );

                            } else {
                                alert('Fill out the required fields and enter detail.');
                            }
                        }

                        $("#btn_save").click(function() {
                            ///////
                            save_car_details("btn_save");
                        });

                        $("#btn_save_and_new").click(function() {
                            ///////
                            save_car_details("btn_save_and_new");
                        });


                        function load_attached_files() {
                            var car_d_id = $("#car_d_id").val();
                            var url = "<?= base_url() . 'index.php/'; ?>car_detail/select_attached_files_list?car_d_id=" + car_d_id;
                            var attachments_url = "https://www.asiahilux.com/uploads/";


                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {

                                    if (field.length == 0) {
                                        $('#tbl_files').html('<tr><td colspan="2">No images attached with this car details.</td></tr>');
                                    } else {
                                        var rowtags = "";
                                        for (j = 0; j < field.length; j++) {
                                            rowtags += '<tr><td style="width: 20%;"><button name="btn_delete_file" data="' + field[j].car_d_id + '" stored_file_name="' + field[j].stored_file_name + '" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td><td style="width: 80%;"><a href="' + attachments_url + field[j].stored_file_name + '" target="_blank">' + field[j].user_file_name + '</a></td></tr>';
                                        }
                                        $('#tbl_files').html(rowtags);
                                    }
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session hase been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {
                                    $("#loader_view").hide();
                                    alert("No connection available.");
                                } else {
                                    $("#loader_view").hide();
                                    alert(xhr.responseText);
                                }
                            });
                        }

                        $('#tbl_files').on('click', 'button[name=btn_delete_file]', function() {

                            var r = confirm("Do you confirm delete this image?");
                            if (r == true) {
                                var url = "<?= base_url() . 'index.php/'; ?>car_detail/delete_attachment";

                                var formdata_d = {
                                    'car_d_id': $(this).attr("data"),
                                    'stored_file_name': $(this).attr("stored_file_name")
                                }
                                SendDataByAjax3(url, formdata_d, function(result) {

                                    var obj = JSON.parse(result);
                                    console.log(obj);
                                    if (obj.res) {
                                        alert("File deleted.");
                                    } else {
                                        alert(obj.msg);
                                    }
                                    load_attached_files();
                                });
                            }
                        });

                        function load_attached_files_carfeatured() {
                            var car_d_id = $("#car_d_id").val();
                            var url = "<?= base_url() . 'index.php/'; ?>car_detail/select_attached_files_list_featured_image?car_d_id=" + car_d_id;
                            var attachments_url = "https://www.asiahilux.com/uploads/thumbnail/";


                            $.getJSON(url, function(result) {
                                $.each(result, function(i, field) {

                                    if (field.length == 0) {
                                        $('#tbl_files_featured').html('<tr><td colspan="2">No featured image attached with this car.</td></tr>');
                                    } else {
                                        var rowtags = "";
                                        for (j = 0; j < field.length; j++) {
                                            rowtags += '<tr><td style="width: 20%;"><button name="btn_delete_file_carfeatured" data="' + field[j].car_d_id + '" stored_file_name="' + field[j].stored_file_name + '" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td><td style="width: 80%;"><a href="' + attachments_url + field[j].stored_file_name + '" target="_blank">' + field[j].user_file_name + '</a></td></tr>';
                                        }
                                        $('#tbl_files_featured').html(rowtags);
                                    }
                                });
                            }).fail(function(xhr) {

                                if (xhr.status == "404") {
                                    alert("Your login session hase been expired. Please login again.");
                                    location.reload();
                                } else if (xhr.status == "0") {
                                    $("#loader_view").hide();
                                    alert("No connection available.");
                                } else {
                                    $("#loader_view").hide();
                                    alert(xhr.responseText);
                                }
                            });
                        }

                        $('#tbl_files_featured').on('click', 'button[name=btn_delete_file_carfeatured]', function() {

                            var r = confirm("Do you confirm delete this image?");
                            if (r == true) {
                                var url = "<?= base_url() . 'index.php/'; ?>car_detail/delete_attachment_featured_image";

                                var formdata_d = {
                                    'car_d_id': $(this).attr("data"),
                                    'stored_file_name': $(this).attr("stored_file_name")
                                }
                                SendDataByAjax3(url, formdata_d, function(result) {

                                    var obj = JSON.parse(result);
                                    console.log(obj);
                                    if (obj.res) {
                                        alert("File deleted.");
                                    } else {
                                        alert(obj.msg);
                                    }
                                    load_attached_files_carfeatured();
                                });
                            }
                        });


                        $("#btn_show_attach").click(function() {
                            $('#myModal-upload').modal('show');
                        });
                        $("#btn_show_attach_carfeatured").click(function() {
                            $('#myModal-upload_carfeatured').modal('show');
                        });



                        $('#myModal-upload').on('hidden.bs.modal', function(e) {
                            load_attached_files();
                        });

                        $('#myModal-upload_carfeatured').on('hidden.bs.modal', function(e) {
                            load_attached_files_carfeatured();
                        });
                    </script>


                    </body>

                    </html>