<?php 

session_start();

$mysql = new mysqli('localhost', 'root', '', 'muslim') or die(mysqli_error($mysql)); 
$id = 0;
$uptade = false;
$name = '';
$job = '';
$salary = '';


if(isset($_POST['send'])) {
    $name = $_POST['name'];
    $job = $_POST['job'];
    $salary = $_POST['salary'];
       
    
    $mysql->query("insert into project (name, job, salary) values ('$name', '$job', '$salary')") or die($mysql->error);
    
    $_SESSION['message'] = "Malumotlatr saqlandi";
    $_SESSION['msg_type'] = "success"; 
    
    header("Location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysql->query("delete from project where id=$id") or die ($mysql->error);
    $_SESSION['message'] = "Malumotlatr ocirildi";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $uptade = true;
    $result = $mysql->query("select * from project where id=$id") or die ($mysql->error);

    if ($result!=null) {
        $qator = $result->fetch_assoc();
        $name = $qator['name'];
        $job = $qator['job'];
        $salary = $qator['salary'];

    }
}

if (isset($_POST['uptade'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $job = $_POST['job'];
    $salary = $_POST['salary'];
    
    $mysql->query("update project set name='$name', job='$job', salary='$salary' where id=$id") or die ($mysql->error);

    $_SESSION['massage'] = "ozgartirildi";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}

?>