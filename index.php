<!DOCTYPE html>
<html lang='en'>
<head>
    <title>family tree</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="CSS/index.css"/>
    <link rel="stylesheet" href="Libraries/bootstrap_4.5.2.css">
</head>
<body>
    <div class="main container-fluid">
        <div class="row">
            <div class="main_left col-10">
                <div class="main_left__add row">
                    <div class="col-12">
                        <form method='post' action='handle/add.php' target='frameAdd'>
                            <table class="table table-hover table-dark">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
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
                                  <td class="bg-danger"><input type="text" name="people_FN" id="people_FN" list="allFN"></td>
                                  <td><input type="text" name="people_LN" id="people_LN" list="allLN"></td>
                                  <td><input type="text" name="people_Patr" id="people_Patr" list="allPatr"></td>
                                  <td><input type="text" name="people_YOB" id="people_YOB" placeholder="2003"></td>
                                  <td><input type="text" name="people_BP" id="people_BP" placeholder="Minsk" list="allBP"></td>
                                  <td><input type="text" name="people_Desc" id="people_Desc" placeholder="My best friend"></td>
                                </tr>
                                <tr>
                                  <th scope="row">Mother</th>
                                  <td class="bg-danger"><input type="text" name="mother_FN" id="mother_FN" list="allFN"></td>
                                  <td><input type="text" name="mother_LN" id="mother_LN" list="allLN"></td>
                                  <td><input type="text" name="mother_Patr" id="mother_Patr" list="allPatr"></td>
                                  <td><input type="text" name="mother_YOB" id="mother_YOB" placeholder="2003"></td>
                                  <td><input type="text" name="mother_BP" id="mother_BP" placeholder="Minsk" list="allBP"></td>
                                  <td><input type="text" name="mother_Desc" id="mother_Desc" placeholder="My best friend"></td>
                                </tr>
                                <tr>
                                  <th scope="row">Father</th>
                                  <td class="bg-danger"><input type="text" name="father_FN" id="father_FN" list="allFN"></td>
                                  <td><input type="text" name="father_LN" id="father_LN" list="allLN"></td>
                                  <td><input type="text" name="father_Patr" id="father_Patr" list="allPatr"></td>
                                  <td><input type="text" name="father_YOB" id="father_YOB" placeholder="2003"></td>
                                  <td><input type="text" name="father_BP" id="father_BP" placeholder="Minsk" list="allBP"></td>
                                  <td><input type="text" name="father_Desc" id="father_Desc" placeholder="My best friend"></td>
                                </tr>
                              </tbody>
                            </table>
                            <?php require 'modules/makeDatalists.php'; ?>
                            <div class="row mt-3 d-flex justify-content-center">
                                <input type='submit' value='Add'>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="main_left__delete row">
                    <div class="col-12 d-flex justify-content-center">
                        <form method='post' action='handle/delete.php' target='frameAdd'>
                            <div class="form-group">
                                <label for="peoples">peoples</label>
                                <select class="form-control" id="peoples">
                                    <?php # makeOptions(); ?>
                                </select>
                            </div>
                            <?php require ('modules/makeCheckboxes.php'); ?>
                            <input type='submit' value='Delete'>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="main_left__print row">
                    <div class="col-12 d-flex justify-content-center">
                        <form id='print' method='post' action='handle/print.php'>
                            <input type='submit' value='Print'>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main_right col-2">
                <div class="embed-responsive embed-responsive-1by1">
                  <iframe  name='frameAdd' class="embed-responsive-item"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="JS/index.js"></script>

    <script src="Libraries/jquery-3.5.1.slim.js"></script>
    <script src="Libraries/popper.js"></script>
    <script src="Libraries/bootstrap_4.5.2.js"></script>
</body>
</html>
<?php // TODO: Добавить ещё две формы поверх 'add', так что бы влюбое время была видна только одна из них. Можно с сайта bootstrap скопировать, вроде, книжки назывался элемент.