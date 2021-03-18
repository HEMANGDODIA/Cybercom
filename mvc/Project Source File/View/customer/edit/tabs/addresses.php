<?php
require_once './View/template/header.php';
$billingaddress = $this->getBillingAddress();
$shippingaddress=$this->getShippingAddress();
?>


<fieldset>
        <legend>Billing Address </legend>  
 </fieldset>
  
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="address">ADDRESS</label>
            <div class="col-md-4">
            <textarea id="address" name="billing[address]" placeholder="ADDRESS" class="form-control input-md" required="" cols="50" rows="10" ><?php echo $billingaddress->address ?></textarea>
            </div>
        </div><br>
 
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="city">CITY</label>
            <div class="col-md-4">
            <input id="city" name="billing[city]" placeholder="CITY" class="form-control input-md" required="" type="text" value="<?php echo $billingaddress->city ?>" >
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="state">STATE</label>
            <div class="col-md-4">
            <input id="state" name="billing[state]" placeholder="STATE" class="form-control input-md" required=""  value="<?php echo $billingaddress->state ?>" type="text" >
            </div>
        </div><br>

        <div class="form-group row ">
            <label class="col-md-4 control-label text-center" for="zipcode">ZIPCODE</label>
            <div class="col-md-4">
            <input id="zipcode" name="billing[zipcode]" placeholder="ZIPCODE" class="form-control input-md" required="" type="number" 
        value="<?php echo $billingaddress->zipcode ?>"  >
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="country">COUNTRY</label>
            <div class="col-md-4">
            <input id="state" name="billing[country]" placeholder="COUNTRY" class="form-control input-md" required="" type="text" value="<?php echo $billingaddress->country ?>">
            </div>
        </div><br>

<!-- Shipping address --> 

<fieldset>
        <legend>Shipping Address </legend>  
 </fieldset>
  
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="address">ADDRESS</label>
            <div class="col-md-4">
            <textarea id="address" name="shipping[address]" placeholder="ADDRESS" class="form-control input-md" required="" cols="50" rows="10" ><?php echo $shippingaddress->address ?></textarea>
            </div>
        </div><br>
 
        
        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="city">CITY</label>
            <div class="col-md-4">
            <input id="city" name="shipping[city]" placeholder="CITY" class="form-control input-md" required="" type="text" value="<?php echo $shippingaddress->city ?>" >
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="state">STATE</label>
            <div class="col-md-4">
            <input id="state" name="shipping[state]" placeholder="STATE" class="form-control input-md" required="" type="text" value="<?php echo $shippingaddress->state ?>" >
            </div>
        </div><br>

        <div class="form-group row ">
            <label class="col-md-4 control-label text-center" for="zipcode">ZIPCODE</label>
            <div class="col-md-4">
            <input id="zipcode" name="shipping[zipcode]" placeholder="ZIPCODE" class="form-control input-md" required="" type="number"   value="<?php echo $shippingaddress->zipcode ?>" >
            </div>
        </div><br>

        <div class="form-group row">
            <label class="col-md-4 control-label text-center" for="country">COUNTRY</label>
            <div class="col-md-4">
            <input id="state" name="shipping[country]" placeholder="COUNTRY" class="form-control input-md" required="" type="text"   value="<?php echo $shippingaddress->country ?>" >
        </div><br>

        <div class="form-group col-md-12 text-center">
        <input type="submit" name="save">
        </div>


</form>
<?php

?>