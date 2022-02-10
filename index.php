<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <title>SQL table in PHP language</title>
</head>
 
<body>
    <div class="container">
        <?php require_once 'check.php' ?>


        <?php   if (isset($_SESSION['massage'])): ?>

        <div class="alert-<?=$_SESSION['msg_type']?>">

            <?php 
    echo $_SESSION['message'];
    unset($_SESSION['message']);    
    ?>
        </div>
        <?php endif ?>


        <div class="conteiner">
            <?php
    $mysqli = new mysqli('localhost', 'root', '', 'muslim') or die (mysqli_error($mysqli));
    $result = $mysqli->query("select * from project") or die($mysqli->error); 
    ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Salary</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php  while ($qator = $result->fetch_assoc()):  ?>
                    <tr>
                        <td><?php echo $qator['name'] ?></td>
                        <td><?php echo $qator['job'] ?></td>
                        <td><?php echo $qator['salary'] ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $qator['id'];?>" class="btn btn-info">ozgartirish</a>
                            <a href="check.php?delete=<?php echo $qator['id']?>" class="btn btn-danger">Ochirish</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>

                </table>
            </div>

            <?php
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
    ?>

            <div class="row justify-content-center">
                <form action="check.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="enter your name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="job" value="<?php echo $job; ?>" placeholder="enter your job">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="salary" value="<?php echo $salary ?>" placeholder="salary">
                    </div>
                    <div class="form-group">
                        <?php 
                        if ($uptade==true):
                    
                        ?>
                             <button type="submit" name="uptade" class="btn btn-info">O'zgartirish</button>
                         <?php else: ?>    
                        <button type="submit" name="send" class="btn btn-primary">Send your data</button>
                         <?php endif; ?>   
                    </div>
                </form>
            </div>


        </div>
    </div>
</body>

</html>