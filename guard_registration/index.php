<?php
// session_start();
// $_SESSION['message'] = '';
?>

<title>Register</title>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="form.css" type="text/css">

<div class="body-content">
  <div class="module">
    <h1><b> JEDI Registration Form </b></h1>

    <form class="form" action="direct.php" method="POST" enctype="multipart/form-data" autocomplete="off">

      <!-- <div class="alert alert-error"></div> -->
      
      <input type="text" placeholder="Security ID" name="secID" required />
      <input type="text" placeholder="Username" name="username" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="text" placeholder="First Name" name="fName" required />
      <input type="text" placeholder="Last Name" name="lName" required />

      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" /><br><br>
      

    </form>
  </div>
</div>
<?php
