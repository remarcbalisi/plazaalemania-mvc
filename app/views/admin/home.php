<!-- Hello <?=$data['name']?> -->
<?php include_once '../app/views/header/adminheader.php' ?>

<section>
  <h1>Home - <?php echo $data['user']->fname ?></h1>
  <section style="overflow-x:hidden;overflow-y:hidden" width="50px">
      <img width="50px" src="<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/<?php echo $data['user']->prof_pic ?>" alt="">
      <p style="font-size:10px;margin-top:-4px;margin-bottom:2px;"><?php echo $data['user']->email ?></p>
  </section>
  <a href="<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/public/adminhome/logout">
      <button type="button" name="logout">Logout</button>
  </a>

  <button type="button" name="view_admin_users" onclick="changeTab('add_user');">Add User</button>
  <button type="button" name="view_admin_users" onclick="changeTab('view_admin_users');">Admin(<?php echo count($data['admin_users']); ?>)</button>
  <hr>
</section>

<section id="add_user" class="">
    <h3>Add Admin/Manager</h3>
    <?php if( !empty($data['success_msg']) ): ?>
        <p style="color:green"><?=$data['success_msg']?></p>
    <?php endif; ?>
    <?php if( !empty($data['error_msg']) ): ?>
        <p style="color:red"><?=$data['error_msg']?></p>
    <?php endif; ?>
    <form enctype="multipart/form-data" action="<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/public/adminhome/adduser" method="post">
        <input type="text" name="fname" value="" placeholder="First name" required>
        <input type="text" name="mname" value="" placeholder="Middle name" required>
        <input type="text" name="lname" value="" placeholder="Last name" required>
        <input type="email" name="email" value="" placeholder="Email" required>
        <br>
        <input type="text" name="contact" value="" placeholder="Contact #" required>
        <br>
        <textarea name="address" rows="3" cols="80" placeholder="Address" required></textarea>
        <br>
        <select class="" name="gender" required>
            <option value="">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <select class="" name="role" required>
            <option value="">Position</option>
            <?php foreach($data['roles'] as $role): ?>
                <option value="<?php echo $role['id'] ?>"><?php echo $role['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="password" name="password" value="" placeholder="Password" required>
        <input type="password" name="confirm_password" value="" placeholder="Confirm Password" required>
        <br>
        <label style="font-size:11px;">Select profile picture (175px by 200px)</label><br>
        <input type='file'id="file" name="prof_pic" required>
        <br>
        <button type="submit" name="submit">Add</button>
    </form>
</section>

<section id="view_admin_users" style="display:none;" class="">

    <div style="display:none" id="dialog" title="User Information">
      <img id="diag_img" src="http://placehold.it/50x50" alt="Placeholder Image" />
      <p id="diag_name"></p>
    </div>

    <h3>Admin Users</h3>
    <?php if( !empty($data['success_msg']) ): ?>
        <p style="color:green"><?=$data['success_msg']?></p>
    <?php endif; ?>
    <?php if( !empty($data['error_msg']) ): ?>
        <p style="color:red"><?=$data['error_msg']?></p>
    <?php endif; ?>

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Role</th>
        <th>Action</th>
      </tr>

      <?php foreach( $data['admin_users'] as $au ): ?>
      <tr>
        <td><?php echo $au['id']; ?></td>
        <td><?php echo $au['fname'] . " " .$au['mname'] . " " .$au['lname']; ?></td>
        <td><?php echo $au['email']; ?></td>
        <td><?php echo $au['contact']; ?></td>
        <td><?php echo $au['address']; ?></td>
        <td><?php echo $au['gender']; ?></td>
        <td><?php echo $au['name']; ?></td>
        <td>
            <a href="javascript:;" onclick="viewUserById('<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/public/adminhome/viewuserjson/<?php echo $au['id']?>')">View</a>
            <a style="color:green" href="#">Edit</a>
            <a style="color:red" href="#">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>

    </table>
</section>

<script
  src="<?php echo(isset($_SERVER['HTTPS']) ? "https": "http"); ?>://<?php echo htmlspecialchars($_SERVER["HTTP_HOST"]); ?>/plazaalemania/public/js/tabs.js"></script>
</head>

</body>
</html>
