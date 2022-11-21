<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php

    $countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

    include 'includes/header.php';
    ?>
    <div class="wrapper">
        <div class="title">
            Registration Form
        </div>
            <form action="PHP/real-signup-handler.php" method="post" enctype="multipart/form-data" id="form-signup">
                <div class="error-handling">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            $status = "Empty fields!";
                            echo $status;
                        } else if ($_GET["error"] == "invalidUN") {
                            $status = "Username is invalid!";
                            echo $status;
                        } else if ($_GET["error"] == "UNtoolong") {
                            $status = "Username is too long!";
                            echo $status;
                        } else if ($_GET["error"] == "invalidPW") {
                            $status = "Password is invalid!";
                            echo $status;
                        } else if ($_GET["error"] == "PWtoolong") {
                            $status = "Password is too long!";
                            echo $status;
                        } else if ($_GET["error"] == "PWdontmatch") {   
                            $status = "Passwords do not match!";
                            echo $status;
                        } else if ($_GET["error"] == "invalidemail") {
                            $status = "Email is invalid!";
                            echo $status;
                        } else if ($_GET["error"] == "invalidnumber") {
                            $status = "Telephone number is invalid!";
                            echo $status;
                        } else if ($_GET["error"] == "numbertoolong") {
                            $status = "Telephone number is too long!";
                            echo $status;
                        } else if ($_GET["error"] == "PTtoolong") {
                            $status = "Profile text is too long";
                            echo $status;
                        } else if ($_GET["error"] == "invalidfile") {
                            $status = "This file cannot be uploaded!";
                            echo $status;
                        } else if ($_GET["error"] == "filetoobig") {
                            $status = "This file is too big!";
                            echo $status;     
                        } else if ($_GET["error"] == "error") {
                            $status = "Oops, Something went wrong!";
                            echo $status;
                        }  
                        else if ($_GET["error"] == "userAlreadyExists") {
                            $status = "User already exists";
                            echo $status;
                        }
                    }
                    ?>
                </div>
                <div class="input_field">
                    <label class="labelinput">Username</label>
                    <input type="text" id="username" name="username" class="input" placeholder="username">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                    <div class="tooltip-icon"></div>
                        <div class="tooltip-body">
                            <p>
                            * Username cannot contain symbols. <br>
                            * Username cannot be longer than 10 characters. <br>
                            * Username cannot be empty.
                            </p>
                        </div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Password</label>
                    <input type="password" id="password"  name="password" class="input" placeholder="password">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Repeat Password</label>
                    <input type="password" id="repeatPassword" name="repeatPassword" class="input" placeholder="repeat password">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Email</label>
                    <input type="text" name="email" class="input checkEmailJS" id="email" placeholder="email">
                    <div id="ajax-message"></div>
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>First Name</label>
                    <input type="text" name="firstName" class="input" id="firstName"  placeholder="first name">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Last Name</label>
                    <input type="text" name="lastName" class="input" id="lastName"  placeholder="last name">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label>Gender</label><br />
                    <select id="gender" name="gender">
                        <option disabled selected>
                            Please enter your gender
                        </option>
                        <option value="male">
                            Male
                        </option>
                        <option value="female">
                            Female
                        </option>
                        <option value="other">
                            Other
                        </option>
                    </select>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Date of Birth</label>
                    <input type="text" name="dateOfBirth" class="input" id="dateOfBirth"  placeholder="Date of birth">
                    <small>yyyy-dd-mm</small>
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label>Country</label><br />
                    <select id="countryList" name="country">
                        <option disabled selected>
                            Please enter your country
                        </option>
                    <?php
                        foreach($countries as $country) {
                    ?>    
                        <option value="<?php echo $country; ?>">
                            <?php echo $country; ?>
                        </option>
                        <?php }?>
                    </select>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Postalcode</label>
                    <input type="text" name="postalcode" class="input" id="postalcode" placeholder="postalcode">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>City</label>
                    <input type="text" name="city" class="input" id="city" placeholder="city">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Street Name</label>
                    <input type="text" name="streetName" class="input" id="streetName"  placeholder="street name">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Telephone Number</label>
                    <input type="text" name="telephoneNumber" class="input" id="telephoneNumber" placeholder="telephone number">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>School</label>
                    <input type="text" name="school" class="input" id="school"  placeholder="school">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Study</label>
                    <input type="text" name="study" class="input" id="study"  placeholder="study">
                    <div class="succes-js js-succes-icon"></div>
                    <div class="error-js js-error-icon"></div>
                    <div class="text-error"></div>
                </div>
                <div class="input_field">
                    <div class="text_area">
                        <label class='labelinput'>Profile Text</label>
                        <textarea type="text" name="profileText" class="textarea" id="profileText" placeholder="Please enter up to 500 characters"></textarea>
                        <span id="letterCount">0/500</span>
                        <div class="error-js js"></div>
                    </div>
                </div>
                <div class="input_field">
                    <label class='labelinput'>Profile Logo</label>
                    <input type="file" name="profileLogo" accept=".png, jpg" required class="file_upload" />
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" name="terms" value="agreed">
                        <span class="checkmark"></span>
                    </label>
                    <p>Agreed to terms and conditions</p>
                </div>
                <div class="input_field">
                    <div class="space-button">
                        <input type="submit" value="Register" class="register-btn" name="submit">
                    </div>
                </div>
            </form>
    </div>

    <?php
    include 'includes/footer.php';
    ?>
</body>
</html>