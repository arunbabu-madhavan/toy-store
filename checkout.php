<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Toy Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
			  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
			  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
			  crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Mitr" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/site.css">
    <script src="js/checkout.js"></script>
  </head>
<body>
  <?php include 'header.php' ?>
  <div class="main"><div id="accordion">
    <h3 class="accountDetails">Account Details</h3>
      <div><h5>Choose your checkout option</h5><br>Register with us for a faster checkout, to track the status of your order and more. You can also checkout as a guest.<br>
      <form><input type="radio" name="method" value="guest" />Checkout as Guest<br>
      <input type="radio" name="method" value="register" />Register an Account<br>
      <input type="radio" name="method" value="returningCust" />Returning customer<br>
      <button type="button" id="pickCheckout">Continue</button><br>
      </form>
    </div>
    <h3 class="billingInformation">Billing Details</h3>
      <dl class="billingDetails">
        <dt>
          <label for="FormField_1">
            *
            Email Address:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="1"><input type="hidden" class="FormFieldFormId" value="1"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="EmailAddress">
          <input type="text" id="FormField_1" name="FormField[1][1]" value="" aria-required="true" class="Textbox Field200 FormField">
        </dd>
        <dt>
          <label for="FormField_4">
            * First Name:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="4"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="FirstName">
          <input type="text" id="FormField_4" name="FormField[2][4]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_5">
            * Last Name:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="5"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="LastName">
          <input type="text" id="FormField_5" name="FormField[2][5]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_6">
            * Company Name:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="6"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="CompanyName">
          <input type="text" id="FormField_6" name="FormField[2][6]" value="" aria-required="false" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_7">
            * Phone Number:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="7"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="Phone">
          <input type="text" id="FormField_7" name="FormField[2][7]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_8">
            * Address Line 1:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="8"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine1">
          <input type="text" id="FormField_8" name="FormField[2][8]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_9">
            * Address Line 2:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="9"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine2">
          <input type="text" id="FormField_9" name="FormField[2][9]" value="" aria-required="false" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_10">
            * Suburb/City:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="10"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="City">
          <input type="text" id="FormField_10" name="FormField[2][10]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_11">
            * Country:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldChoosePrefix" value="Choose a Country"><input type="hidden" class="FormFieldId" value="11"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleselect"><input type="hidden" class="FormFieldPrivateId" value="Country">
          <div class="selector" id="uniform-FormField_11" style="width: 195.133px;"><span style="-moz-user-select: none;">Choose a Country</span><select id="FormField_11" name="FormField[2][11]" value="" aria-required="true" class="Field200 FormField field-xlarge Textbox" style="" size="1"><option value="">Choose a Country</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Bahamas">Bahamas</option><option value="Barbados">Barbados</option><option value="Belgium">Belgium</option><option value="Bermuda">Bermuda</option><option value="Canada">Canada</option><option value="Cayman Islands">Cayman Islands</option><option value="Costa Rica">Costa Rica</option><option value="Denmark">Denmark</option><option value="Finland">Finland</option><option value="France">France</option><option value="Germany">Germany</option><option value="Greece">Greece</option><option value="Guam">Guam</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Luxembourg">Luxembourg</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Norway">Norway</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Romania">Romania</option><option value="Singapore">Singapore</option><option value="Spain">Spain</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Thailand">Thailand</option><option value="Turkey">Turkey</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option></select></div>
        </dd>
        <dt>
          <label for="FormField_12">
            * State/Province:
          </label>
        </dt>
        <dd>
          <select name="state" size="1">
            <option value="AK">AK</option>
            <option value="AL">AL</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="ND">ND</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VA">VA</option>
            <option value="VT">VT</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
          </select>
        </dd>
        <dt>
          <label for="FormField_13">
            * Zip/Postcode:</span>
          </label><br>
          <input type="text" />
        </dt>
          <dd>
              <label>
                  <div class="checker" id="saveBillingAddress"><span><input type="checkbox" name="save_billing_address" id="save_billing_address" value="1"></span></div>
                  Save this address in my address book
              </label>
          </dd>
          <dd>
              <label>
                  <div class="checker" id="shipToSameAddress"><span class="checked"><input type="checkbox" name="ship_to_billing_new" id="ship_to_billing_new" value="1" checked="checked" onclick="if(this.checked == false){$('#billing-match-dialog-2').css('display','none');}"></span></div>
                  I also want to ship to this address
              </label>
          </dd>
          <button type="button" id="pickBilling">Continue</button><br>
      </dl>
    <h3>Shipping Details</h3>
    <div><dl><dt>
          <label for="FormField_8">
            * Address Line 1:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="8"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine1">
          <input type="text" id="FormField_8" name="FormField[2][8]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_9">
            * Address Line 2:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="9"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="AddressLine2">
          <input type="text" id="FormField_9" name="FormField[2][9]" value="" aria-required="false" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_10">
            * Suburb/City:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldId" value="10"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleline"><input type="hidden" class="FormFieldPrivateId" value="City">
          <input type="text" id="FormField_10" name="FormField[2][10]" value="" aria-required="true" class="Textbox Field200 FormField">

        </dd>
        <dt>
          <label for="FormField_11">
            * Country:</span>
          </label>
        </dt>
        <dd>
          <input type="hidden" class="FormFieldChoosePrefix" value="Choose a Country"><input type="hidden" class="FormFieldId" value="11"><input type="hidden" class="FormFieldFormId" value="2"><input type="hidden" class="FormFieldType" value="singleselect"><input type="hidden" class="FormFieldPrivateId" value="Country">
          <div class="selector" id="uniform-FormField_11" style="width: 195.133px;"><span style="-moz-user-select: none;">Choose a Country</span><select id="FormField_11" name="FormField[2][11]" value="" aria-required="true" class="Field200 FormField field-xlarge Textbox" style="" size="1"><option value="">Choose a Country</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Bahamas">Bahamas</option><option value="Barbados">Barbados</option><option value="Belgium">Belgium</option><option value="Bermuda">Bermuda</option><option value="Canada">Canada</option><option value="Cayman Islands">Cayman Islands</option><option value="Costa Rica">Costa Rica</option><option value="Denmark">Denmark</option><option value="Finland">Finland</option><option value="France">France</option><option value="Germany">Germany</option><option value="Greece">Greece</option><option value="Guam">Guam</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Luxembourg">Luxembourg</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Norway">Norway</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Romania">Romania</option><option value="Singapore">Singapore</option><option value="Spain">Spain</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Thailand">Thailand</option><option value="Turkey">Turkey</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option></select></div>
        </dd>
        <dt>
          <label for="FormField_12">
            * State/Province:
          </label>
        </dt>
        <dd>
          <select name="state" size="1">
            <option value="AK">AK</option>
            <option value="AL">AL</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="ND">ND</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VA">VA</option>
            <option value="VT">VT</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
          </select>
        </dd>
        <dt>
          <label for="FormField_13">
            * Zip/Postcode:</span>
          </label><br>
          <input type="text" />
        </dt></dl>
        <button type="button" id="pickAddress">Continue</button><br></div>
    <h3>Order Confirmation</h3>
      <div>
        Show PHP order details here.<br>
        <button type="button" id="doneCheckout">Continue</button><br>
    </div>
  </div>

  <?php include 'footer.html' ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

</body>
</html>