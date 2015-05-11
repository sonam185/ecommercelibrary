 <link rel="stylesheet" href="<?php echo base_url();?>css/demo.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.creditCardValidator.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/demo.js"></script>
        
        <div style="height:200px;width=200px">
            <h3>This Sandbox is in test mode 
                to Test the Transaction use this Card Numbers
            </h3>
                <ul>
                    <li> American Express Test Card: 370000000000002</li>
                    <li> Discover Test Card: 6011000000000012</li>
                    <li> Visa Test Card: 4007000000027</li>
                    <li> Second Visa Test Card: 4012888818888</li>
                    <li> <b>Note: Expiry Date Should be Greater than Current Date</b></li>
                </ul>
            </div>
            <form action="<?php echo base_url();?>/index.php/pages/authorize" method="POST">
                <input type="hidden" name="total" value="<?php echo $total;?>">
                <h2>Payment details</h2>

                <ul>
                    <li>
                        <ul class="cards">
                            <li class="visa">Visa</li>
                            <li class="visa_electron">Visa Electron</li>
                            <li class="mastercard">MasterCard</li>
                            <li class="maestro">Maestro</li>
                            <li class="discover">Discover</li>
                        </ul>
                    </li>

                    <li>
                        <label for="card_number">Card number</label>
                        <input type="text" id="card_number" name="card_number">
                    </li>

                    <li class="vertical">
                        <ul>
                            <li>
                                <label for="expiry_date">Expiry date <small>mm/yy</small></label>
                                <input type="text" maxlength="5" id="expiry_date" name="expiry_date">
                            </li>

                            <li>
                                <label for="cvv">CVV</label>
                                <input type="text" maxlength="3" id="cvv" name="cvv">
                            </li>
                        </ul>
                    </li>

                    <li class="vertical maestro" style="display: none; opacity: 0;">
                        <ul>
                            <li>
                                <label for="issue_date">Issue date <small>mm/yy</small></label>
                                <input type="text" maxlength="5" id="issue_date" name="issue_date">
                            </li>

                            <li>
                                <span class="or">or</span>
                                <label for="issue_number">Issue number</label>
                                <input type="text" maxlength="2" id="issue_number" name="issue_number">
                            </li>
                        </ul>
                    </li>

                    <li>
                        <label for="name_on_card">Name on card</label>
                        <input type="text" id="name_on_card" name="name_on_card">
                    </li>
                    <li>
                        <center>
                            <button type="submit" value="Checkout">Checkout</button>
                        </center>
                    </li>
                </ul>
</form>

