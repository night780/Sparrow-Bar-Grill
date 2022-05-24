<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("includes/functions.php");

    if (check_login($_POST['user'], $_POST['pass'])) {
        session_start();
        $_SESSION['user'] = "admin";
        header("Location: views/home");
        exit();
    }
}

$page_title = "Login";
?>
<include href="includes/header.html"></include></div>
<div
        id="jumbotronContainer"
        class="d-flex align-items-center justify-content-center"
>
    <div class="card mt-4">
        <article class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Admin Log In</h4>
            <form id="loginForm" action="#" method="post">
                <div class="form-group">
                    <label>Your Username (admin)</label>
                    <input
                            name="user"
                            id="user"
                            class="form-control"
                            placeholder="Username"
                    />
                    <span id="emailErr" class="text-danger error"
                    >That is the incorrect email</span
                    >
                </div>
                <!-- form-group// -->
                <div class="form-group">
                    <label>Your password (@dm1n)</label>
                    <input
                            id="pass"
                            name="pass"
                            class="form-control"
                            placeholder="******"
                            type="password"
                    />
                    <span id="passwordErr" class="text-danger error"
                    >That is the incorrect password</span>
                </div>
                <!-- form-group// -->
                <div class="form-group">
                    <div class="checkbox">
                        <label> <input type="checkbox"/> Save password </label>
                    </div>
                    <!-- checkbox .// -->
                </div>
                <!-- form-group// -->
                <div class="">
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </div>
                <!-- form-group// -->
            </form>
        </article>
    </div>
</div>
<include href="includes/footer.html"></include>