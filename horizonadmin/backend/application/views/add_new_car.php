
<?php include('include/header.php'); ?>
<?php include('include/nav/vehicle.php');
$current_year = date('Y'); 

$entry_name = '';
$tag = "";
$url = '';
$header_text = '';

$car_d_id = $car_d_id;
$acc_no = $acc_no;

if($action == 'create'){
    $url = base_url('index.php/car_detail/create2');
    $header_text = 'Add New Car Details';
}elseif($action == 'update'){
    $url = base_url('index.php/car_detail/update2');
    $header_text = 'Update Car Details';
}

//echo "<pre>";print_r($car_detail);die;
if(isset($car_detail) && !empty($car_detail)){
        $vm_id = $car_detail->vm_id;
        $m_id = $car_detail->m_id;

        $carname = $car_detail->carname;
        $CDPlayer = $car_detail->CDPlayer;
        $SunRoof = $car_detail->SunRoof;
        $LeatherSeat = $car_detail->LeatherSeat;
        $AlloyWheels = $car_detail->AlloyWheels;
        $PowerSteering = $car_detail->PowerSteering;
        $PowerWindow = $car_detail->PowerWindow;
        $AC = $car_detail->AC;
        $ABS = $car_detail->ABS;
        $Airbag = $car_detail->Airbag;
        $Radio = $car_detail->Radio;
        $CDChanger = $car_detail->CDChanger;
        $DVD = $car_detail->DVD;
        $TV = $car_detail->TV;
        $PoweSeat = $car_detail->PoweSeat;
        $BackTire = $car_detail->BackTire;
        $GrillGuard = $car_detail->GrillGuard;
        $RearSpoiler = $car_detail->RearSpoiler;
        $CentralLocking = $car_detail->CentralLocking;
        $Jack = $car_detail->Jack;
        $SpareTire = $car_detail->SpareTire;
        $WheelSpanner = $car_detail->WheelSpanner;

        $carprice = $car_detail->carprice;
        $Fuel = $car_detail->Fuel;
        $Transmission = $car_detail->Transmission;
        $Steering = $car_detail->Steering;


        $VehicleNo = $car_detail->VehicleNo;
        $Chassis = $car_detail->Chassis;
        $ModelCode = $car_detail->ModelCode;
        $VersionClass = $car_detail->VersionClass;
        $EngineCode = $car_detail->EngineCode;
        $Mileage = $car_detail->Mileage;
        $EngineSize = $car_detail->EngineSize;
        $RegistrationYear = $car_detail->RegistrationYear;
        $RegistrationMonth = $car_detail->RegistrationMonth;
        $ManufactureYear = $car_detail->ManufactureYear;
        $ManufactureMonth = $car_detail->ManufactureMonth;
        $Ext_Color = $car_detail->Ext_Color;
        $WheelDrive = $car_detail->WheelDrive;
        $Location = $car_detail->Location;
        $Dimension = $car_detail->Dimension;
        $Doors = $car_detail->Doors;
        $M3 = $car_detail->M3;
        $Seats = $car_detail->Seats;
        $Weight = $car_detail->Weight;
        $car_tag = $car_detail->car_tag;
        $cardisprice = $car_detail->cardisprice;

        $Title = $car_detail->Title;
        $Keywords = $car_detail->Keywords;
        $Description = $car_detail->Description;
    
        $Bodytype = array();
        $Country = array();
        
        foreach($body as $b){
            array_push($Bodytype,$b->bodytype_id);
        }
        
        foreach($country as $c){
            array_push($Country,$c->country_detail_id);
        }

        // echo "<pre>";print_r($countries);die;
}else{
    $vm_id = $m_id = $carname = $CDPlayer = $SunRoof = $LeatherSeat = $AlloyWheels = $PowerSteering = $PowerWindow = $AC = $ABS = $Airbag = $Radio = $CDChanger = $DVD = $TV = $PoweSeat = $BackTire = $GrillGuard = $RearSpoiler = $CentralLocking = $Jack = $SpareTire = $WheelSpanner = $carprice = $Fuel = $Transmission = $Steering = $VehicleNo = $Chassis = $ModelCode = $VersionClass = $EngineCode = $Mileage = $EngineSize = $RegistrationYear = $RegistrationMonth = $ManufactureYear = $ManufactureMonth = $Ext_Color = $WheelDrive = $Location = $Dimension = $Doors = $M3 = $Seats = $Weight = $car_tag = $cardisprice = $Title = $Keywords = $Description = "";
    $Bodytype = array();
    $Country[0] = 213;
}
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
                                            <h3><?= $header_text; ?></h3>
                                        </header>
                                    </div>
                                    <div>
                                        <div class="card-body">
                                            
                                            <div id="msg-error" class="alert alert-danger fade in" style="display: none;">
                                                <a href="#" class="close" onclick='javascript:$("#msg-error").hide();' aria-label="close">&times;</a>
                                                <div></div>
                                            </div>

                                            <form method="POST" action="<?= $url; ?>" id="car_form" class="form form-validate">
                                                <input type="hidden" id="car_d_id" name="set_data[car_d_id]" value="<?= $car_d_id; ?>" />
                                                <input type="hidden" id="acc_no" name="set_data[acc_no]" value="<?= $acc_no ?>">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select class="form-control select2-list" id="vm_id" name="set_data[vm_id]" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="vm_id">
                                                                Select Car Manufacturer Name *
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <select class="form-control select2-list" id="m_id" name="set_data[m_id]" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="m_id">
                                                                Select Car Model Name *
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="carname" name="set_data[carname]" maxlength="300" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 300 characters allowed" value="<?= $carname; ?>" required="true">
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
                                                            <input type="hidden" value="0" name="set_data[CDPlayer]" >
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="CDPlayer" value="1" name="set_data[CDPlayer]" <?php if ($CDPlayer == "1") echo "checked";?>><span>CD Player</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[SunRoof]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="SunRoof" value="1" name="set_data[SunRoof]" <?php if ($SunRoof == "1") echo "checked";?>><span>Sun Roof</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[LeatherSeat]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="LeatherSeat" value="1" name="set_data[LeatherSeat]" <?php if ($LeatherSeat == "1") echo "checked";?>><span>Leather Seat</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[AlloyWheels]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="AlloyWheels" value="1" name="set_data[AlloyWheels]" <?php if ($AlloyWheels == "1") echo "checked";?>><span>Alloy Wheels</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[PowerSteering]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PowerSteering" value="1" name="set_data[PowerSteering]" <?php if ($PowerSteering == "1") echo "checked";?>><span>Power Steering</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[PowerWindow]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PowerWindow"  value="1" name="set_data[PowerWindow]" <?php if ($PowerWindow == "1") echo "checked";?>><span>Power Window</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[AC]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="AC" value="1" name="set_data[AC]" <?php if ($AC == "1") echo "checked";?>><span>A/C</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[ABS]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="ABS" value="1" name="set_data[ABS]" <?php if ($ABS == "1") echo "checked";?>><span>ABS</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[Airbag]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Airbag" value="1" name="set_data[Airbag]" <?php if ($Airbag == "1") echo "checked";?>><span>Airbag</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[Radio]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Radio" value="1" name="set_data[Radio]" <?php if ($Radio == "1") echo "checked";?>><span>Radio</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[CDChanger]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="CDChanger" value="1" name="set_data[CDChanger]" <?php if ($CDChanger == "1") echo "checked";?>><span>CD Changer</span>
                                                        </label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[DVD]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="DVD" value="1" name="set_data[DVD]" <?php if ($DVD == "1") echo "checked";?>><span>DVD</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[TV]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="TV" value="1" name="set_data[TV]" <?php if ($TV == "1") echo "checked"; ?>><span>TV</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[PoweSeat]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="PoweSeat" value="1" name="set_data[PoweSeat]" <?php if ($PoweSeat == "1") echo "checked";?>><span>Power Seat</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[BackTire]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="BackTire" value="1" name="set_data[BackTire]" <?php if ($BackTire == "1") echo "checked";?>><span>Back Tire</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[GrillGuard]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="GrillGuard" value="1" name="set_data[GrillGuard]" <?php if ($GrillGuard == "1") echo "checked";?>><span>Grill Guard</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[RearSpoiler]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="RearSpoiler" value="1" name="set_data[RearSpoiler]" <?php if ($RearSpoiler == "1") echo "checked";?>><span>Rear Spoiler</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" value="0" name="set_data[CentralLocking]">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" value="1" id="CentralLocking" value="1" name="set_data[CentralLocking]" <?php if ($CentralLocking == "1") echo "checked";?>><span>Central Locking</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-2">
                                                            <input type="hidden"  name="set_data[Jack]" value="0">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="Jack" name="set_data[Jack]" value="1" <?php if ($Jack == "1") echo "checked";?>><span>Jack</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" name="set_data[SpareTire]" value="0">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" value="1" id="SpareTire" name="set_data[SpareTire]" <?php if ($SpareTire == "1") echo "checked";?>><span>Spare Tire</span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                            <input type="hidden" name="set_data[WheelSpanner]" value="0">
                                                        <label class="checkbox-inline checkbox-styled checkbox-success">
                                                            <input type="checkbox" id="WheelSpanner" value="1" name="set_data[WheelSpanner]" <?php if ($WheelSpanner == "1") echo "checked";?>><span>Wheel Spanner</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <br>
                                                <h3>Car Specification:</h3>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="carprice" name="set_data[carprice]" max="99999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 5 digit allowed Format Price is : $65000" value="<?= $carprice; ?>" required="true">
                                                            <label for="Car Price">
                                                                Car Price *
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="bodytype" name="bodytype[]" class="form-control select2-list" multiple="multiple">
                                                                <?php foreach($bodytypes as $bodyt) {?>
                                                                <option value="<?= $bodyt['bodytype_id'] ?>" <?php if(!empty($Bodytype) && in_array($bodyt['bodytype_id'],$Bodytype)) echo "selected";?>><?= $bodyt['bodytype_name'] ?></option>
                                                                <?php }?>
                                                            </select>
                                                            <label for="bodytype">Body Types *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="fuel" name="set_data[fuel]" class="form-control select2-list" required="true">
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
                                                            <select id="transmission" name="set_data[transmission]" class="form-control select2-list" required="true">
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
                                                            <select id="steering" name="set_data[steering]" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <option value="1" <?php if ($Steering == "1") echo 'selected="selected"'; ?>>Left</option>
                                                                <option value="2" <?php if ($Steering == "2") echo 'selected="selected"'; ?>>Right</option>
                                                            </select>
                                                            <label for="steering">Steering *</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="VehicleNo" name="set_data[VehicleNo]" max="99999999999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 11 digit allowed Format Vehicle No. is : 725040" value="<?= $VehicleNo; ?>" required="true">
                                                            <label for="VehicleNo">
                                                                Vehicle No. *
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Chassis" name="set_data[Chassis]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $Chassis; ?>">
                                                            <label for="Chassis">
                                                                Chassis #
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="ModelCode" name="set_data[ModelCode]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $ModelCode; ?>">
                                                            <label for="ModelCode">
                                                                Model Code
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="VersionClass" name="set_data[VersionClass]" maxlength="200" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 200 characters are allowed" value="<?= $VersionClass; ?>">
                                                            <label for="VersionClass">
                                                                Version/Class
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="EngineCode" name="set_data[EngineCode]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $EngineCode; ?>">
                                                            <label for="EngineCode">
                                                                Engine Code
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Mileage" name="set_data[Mileage]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters are allowed" value="<?= $Mileage; ?>">
                                                            <label for="Mileage">
                                                                Mileage
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="EngineSize" name="set_data[EngineSize]" maxlength="10" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 10 characters are allowed" value="<?= $EngineSize; ?>">
                                                            <label for="EngineSize">
                                                                Engine Size
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="RegistrationYear" name="set_data[RegistrationYear]" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <?php for($i = $current_year ; $i>=1950; $i--){?>
                                                                    <option value="<?= $i ?>" <?php if ($RegistrationYear == $i) echo 'selected="selected"'; ?>><?= $i ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="RegistrationYear">Registration Year *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="RegistrationMonth" name="set_data[RegistrationMonth]" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <?php for($i = 1; $i<=12; $i++){?>
                                                                    <option value="<?= $i ?>" <?php if ($RegistrationMonth == $i) echo 'selected="selected"'; ?>><?= $i ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="RegistrationYear">Registration Month *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="ManufactureYear" name="set_data[ManufactureYear]" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <?php for($i = $current_year; $i>=1950; $i--){?>
                                                                    <option value="<?= $i ?>" <?php if ($ManufactureYear == $i) echo 'selected="selected"'; ?>><?= $i ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="RegistrationYear">Manufacture Year *</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="ManufactureMonth" name="set_data[ManufactureMonth]" class="form-control select2-list" required="true">
                                                                <option value=""></option>
                                                                <?php for($i = 1; $i<=12; $i++){?>
                                                                    <option value="<?= $i ?>" <?php if ($ManufactureMonth == $i) echo 'selected="selected"'; ?>><?= $i ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label for="ManufactureMonth">Manufacture Month *</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Ext_Color" name="set_data[Ext_Color]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 100 characters allowed" value="<?= $Ext_Color; ?>">
                                                            <label for="Ext_Color">
                                                                Ext. Color
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="WheelDrive" name="set_data[WheelDrive]" maxlength="20" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 20 characters allowed" value="<?= $WheelDrive; ?>">
                                                            <label for="WheelDrive">
                                                                Wheel Drive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="Location" name="set_data[Location]" class="form-control select2-list" required="true">
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
                                                            <input type="text" class="form-control" id="Dimension" name="set_data[Dimension]" maxlength="100" data-toggle="Dimension" data-placement="Dimension" data-trigger="hover" data-original-title="Maximum 100 characters allowed" value="<?= $Dimension; ?>">
                                                            <label for="Dimension">
                                                                Dimension
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="Doors" name="set_data[Doors]" max="30" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 3 digit allowed. Format Doors is : 3, 5 etc" value="<?= $Doors; ?>">
                                                            <label for="Doors">
                                                                Doors
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="M3" name="set_data[M3]" maxlength="100" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 10 digit allowed Format M3 is : 7.624" value="<?= $M3; ?>">
                                                            <label for="M3">
                                                                M3
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="Seats" name="set_data[Seats]" max="200" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 3 digit allowed. Format Seats is : 2 , 5 etc" value="<?= $Seats; ?>">
                                                            <label for="Seats">
                                                                Seats
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="Weight" name="set_data[Weight]" maxlength="20" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 20 characters are allowed. Format Seats is : 740 etc" value="<?= $Weight; ?>">
                                                            <label for="Weight">
                                                                Weight
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="country" name="country[]" class="form-control select2-list" multiple="multiple">
                                                                <?php foreach($countries as $country) {?>
                                                                <option value="<?= $country['country_id'] ?>" <?php if(!empty($Country) && in_array($country['country_id'],$Country)) echo "selected";?>><?= $country['country_name'] ?></option>
                                                                <?php }?>
                                                            </select>
                                                            <label for="country">Country Name</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <select id="car_tag" name="set_data[car_tag]" class="form-control">
                                                                <option value=""></option>
                                                                <option value="1" <?php if ($car_tag == "1") echo 'selected="selected"'; ?>>Discounted</option>
                                                                <option value="2" <?php if ($car_tag == "2") echo 'selected="selected"'; ?>>Clearance Sale</option>
                                                            </select>
                                                            <label for="car_tag">Car Tag </label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="cardisprice" name="set_data[cardisprice]" max="99999" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 5 digit allowed Format Price is : $65000" value="<?= $cardisprice; ?>">
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
                                                            <textarea class="form-control" id="Title" name="set_data[Title]" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Title; ?></textarea>
                                                            <label for="Title">
                                                                Title
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="Keywords" name="set_data[Keywords]" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Keywords; ?></textarea>
                                                            <label for="Keywords">
                                                                Keywords
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="Description" name="set_data[Description]" maxlength="60000" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-original-title="Maximum 60,000 characters are allowed." rows="5"><?= $Description; ?></textarea>
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
                                                            echo "<pre>";print_r($files_list);die;
                                                                foreach ($files_list as $fl) {
                                                                    
                                                            ?>
                                                                    
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
                                                <button onclick="$('#car_form').submit();" type="button" class="btn btn-primary btn-raised btn-loading-state">Save Car Details</button>
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
                        
                        populate_CarManufacturer_Dropdown();
                        load_attached_files();
                        load_attached_files_carfeatured();
                        //populate_Bodytype_Dropdown();
                        //populate_countryList_Dropdown();


                        $("#my-awesome-dropzone").dropzone();
                        $("#my-awesome-dropzone_1").dropzone();

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
                                    'acc_no': $("#acc_no").val(),
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


                                url = "<?= base_url() . 'index.php/'; ?>car_detail/create2";

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
                                            rowtags += '<tr><td style="width: 20%;"><button name="btn_delete_file" data="' + field[j].car_d_id + '" stored_file_name="' + field[j].stored_file_name + '" class="btn btn-sm btn-danger glyphicon glyphicon-remove btn-responsive"></button></td><td style="width: 80%;"><a href="' + attachments_url + '/' +field[j].car_d_id + '/' +field[j].stored_file_name + '" target="_blank">' + field[j].user_file_name + '</a></td></tr>';
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