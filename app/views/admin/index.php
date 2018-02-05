<!-- Hello <?=$data['name']?> -->
<?php include_once '../app/views/header/adminheader.php' ?>

<div>
  <h1>Plaza Alemania Reservation System - Log in</h1>
</div>

<?php if( !empty($data['error_msg']) ): ?>
    <p style="color:red"><?=$data['error_msg']?></p>
<?php endif; ?>
<form class="" action="<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/public/adminlogin/login" method="post">
    <input type="email" name="email" value="" placeholder="email" required>
    <input type="password" name="password" value="" placeholder="password" required>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
