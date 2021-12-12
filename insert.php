<?php 
        session_start();              
        include 'db.php';

        if(isset($_POST['submit'])){
        $pdf = $_FILES['pdf_file']['name'];
        $pdf_type = $_FILES['pdf_file']['type'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $pdf_tem_loc = $_FILES['pdf_file']['tmp_name'];
        $pdf_store = "PDF/".$pdf;

        move_uploaded_file($pdf_tem_loc, $pdf_store);

        $sql = "INSERT INTO pdf (`pdf_file`) VALUES ('$pdf')";
        $query = mysqli_query($con, $sql);

        if($query){
            $_SESSION['status'] = "บันทึกข้อมูลสำเร็จ !";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "บันทึกข้อมูลไม่สำเร็จสำเร็จ !";
            header("Location: index.php");
        }

    }
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Insert PDF</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Insert PDF File</h3>
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="form-control">
                        <label for="">Choose Your PDF File</label>
                        <input id="pdf" type="file" name="pdf_file" required>
                        <input id="upload" type="submit" name="submit" class="btn btn-primary form-control" value="Upload File">

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>