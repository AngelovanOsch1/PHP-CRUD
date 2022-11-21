<input type="checkbox" id="show">
<label for="show" class="show-btn">View Login Form</label>

<div class="container-login">

    <label for="show" class="far fa-window-close"></label>
    <div class="text-login">Login Form</div>

    <form action="PHP/real-login-handler.php" method="post" id="form">
        <div class="data">
            <label>Email</label>
            <input type="text" name="email" placeholder="Enter your Email">
        </div>
        <div class="data">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your Password">
        </div>
        <div class="forgot-password"><a href="#">Forgot Password</a></div>
        <div class="btn">
            <div class="inner">
                <button type="submit" name="submit">Login</button>
            </div>
        </div>
        <div class="signup-link">
            Not a member?<br><br>
            <a href="login-student.php">Sign up now</a>
        </div>
    </form>
</div>