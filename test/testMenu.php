<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/ceee3d5b7f.js" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    body {
      margin: 0px;
      margin-top: 10px;
      padding: 0px;
    }

    nav {
      width: 100%;
      background-color: rgb(39, 39, 39);
      overflow: auto;
      height: auto;
    }

    .links {
      display: inline-block;
      text-align: center;
      padding: 14px;
      color: rgb(178, 137, 253);
      text-decoration: none;
      font-size: 17px;
    }

    .links:hover {
      background-color: rgb(100, 100, 100);
    }

    .selected {
      background-color: rgb(0, 18, 43);
    }

    @media screen and (max-width: 600px) {
      .links {
        display: block;
      }
    }
  </style>
</head>

<body>
  <nav>
    <a class="links selected" href="#"><i class="far fa-user-circle"></i></a>
    <a class="links" href="#"><i class="fa fa-fw fa-user"></i> Login</a>
    <a class="links" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Register</a>
    <a class="links" href="#"><i class="fa fa-fw fa-envelope"></i> Contact Us</a>
    <a class="links" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> More Info</a>
  </nav>

  <script src="../assets/js/main.js"></script>
</body>

</html>