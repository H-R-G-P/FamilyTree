<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="CSS/index.css"/>
    <link rel="stylesheet" href="http://localhost/libraries/bootstrap_4.5.2.css">
</head>
<body>
<p>
  <button class="btn btn-primary true" onclick="addPeople()">
    Add people
  </button>
  <button class="btn btn-primary" onclick="addSister()">
    Add sister
  </button>
  <button class="btn btn-primary" onclick="addBrother()">
    Add brother
  </button>
    <button id="test" onclick="f()">close</button>
    <button id="test" onclick="d()">open</button>
</p>
<div class="collapse show" id="addPeople">
  <div class="card card-body">
    <div class="main_left__add row">
        <div class="col-12">
            <form>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th scope="col">first</th>
                      <th scope="col" class="bg-danger">first name</th>
                      <th scope="col">last name</th>
                      <th scope="col">patronymic</th>
                      <th scope="col">year of birth</th>
                      <th scope="col">birth place</th>
                      <th scope="col">description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">People</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Mother</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Father</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                  </tbody>
                </table>
                <div class="row mt-3 d-flex justify-content-center">
                    <input type='submit' value='Add'>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<div class="collapse" id="addSister">
  <div class="card card-body">
    <div class="main_left__add row">
        <div class="col-12">
            <form>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th scope="col">second</th>
                      <th scope="col" class="bg-danger">first name</th>
                      <th scope="col">last name</th>
                      <th scope="col">patronymic</th>
                      <th scope="col">year of birth</th>
                      <th scope="col">birth place</th>
                      <th scope="col">description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">People</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Mother</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Father</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                  </tbody>
                </table>
                <div class="row mt-3 d-flex justify-content-center">
                    <input type='submit' value='Add'>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<div class="collapse" id="addBrother">
  <div class="card card-body">
    <div class="main_left__add row">
        <div class="col-12">
            <form>
                <table class="table table-hover table-dark">
                  <thead>
                    <tr>
                      <th scope="col">second</th>
                      <th scope="col" class="bg-danger">first name</th>
                      <th scope="col">last name</th>
                      <th scope="col">patronymic</th>
                      <th scope="col">year of birth</th>
                      <th scope="col">birth place</th>
                      <th scope="col">description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">People</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Mother</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                    <tr>
                      <th scope="row">Father</th>
                      <td class="bg-danger"><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" ></td>
                      <td><input type="text" placeholder="2003"></td>
                      <td><input type="text" placeholder="Minsk" ></td>
                      <td><input type="text" placeholder="My best friend"></td>
                    </tr>
                  </tbody>
                </table>
                <div class="row mt-3 d-flex justify-content-center">
                    <input type='submit' value='Add'>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>



    <script src="JS/index.js"></script>

    <script src="http://localhost/libraries/jquery-3.5.1.slim.js"></script>
    <script src="http://localhost/libraries/popper.js"></script>
    <script src="http://localhost/libraries/bootstrap_4.5.2.js"></script>
</body>
</html>


<?php
echo "<pre>";
echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>   ";


$row = ['danik', 'Alex'];

list($LN, $Patr) = $row;

echo "LN: $LN, Patr: $Patr.";

echo "</pre>";