<!--Font Awesome CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/pay.css">
    <div class="container">
        <div class="title">
            <h4>Select a <span style="color: #6064b6">Payment</span> method</h4>
        </div>

        <form action="#">
            <input type="radio" name="payment" id="visa">
            <input type="radio" name="payment" id="mastercard">
            <input type="radio" name="payment" id="paypal">
            <input type="radio" name="payment" id="AMEX">


            <div class="category">
                <label for="visa" class="visaMethod">
                    <a href="https://rib.affinalways.com/retail/#!/login">
                    <div class="imgName">
                        <div class="imgContainer visa">
                            <img src="../logoimg/affin.png" alt="">
                        </div>
                        <span class="name">Affin Bank</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </a>
                </label>

                <label for="mastercard" class="mastercardMethod">
                <a href="https://www.cimbclicks.com.my/clicks/#/">
                    <div class="imgName">
                        <div class="imgContainer mastercard">
                            <img src="../logoimg/cimb.jpeg" alt="">
                        </div>
                        <span class="name">CIMB Clicks</span>
                    </div>
                    
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </a>
                </label>

                <label for="paypal" class="paypalMethod">
                    <a href="https://www.maybank2u.com.my/mbb/m2u/common/M2ULogin.do?action=Login">
                    <div class="imgName">
                        <div class="imgContainer paypal">
                            <img src="../logoimg/maybank.jpg" alt="">
                        </div>
                        <span class="name">Maybank</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </a>
                </label>

                <label for="AMEX" class="amexMethod">
                    <a href="https://www2.irakyat.com.my/personal/login/login.do?step1=">
                    <div class="imgName">
                        <div class="imgContainer AMEX">
                            <img src="../logoimg/br.png" alt="">
                        </div>
                        <span class="name">Bank Rakyat</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </a>
                </label>
            </div>
            
        </form><a href="donate.php" class="btn btn-danger float-end" style="margin-left: 500px;">BACK</a>
    </div>