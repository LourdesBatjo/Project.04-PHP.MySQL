<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="index.html">Home</a> |
        <a href="blog.html">blog</a> |
        <a href="gallery.html">Gallery</a> |
        <a href="contact.html">Contact</a>
    </nav>

    <hr />

    <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    require 'db.php';
                
                    $nama = $conn->real_escape_string($_POST['data-nama']);
                    $pertayaan = $conn->real_escape_string($_POST['data-tanya']);
                
                    $sql = "INSERT INTO contacts (nama, pertayaan) VALUES ('$nama', '$pertayaan')";
                
                    if($conn->query($sql) === TRUE){
                        echo "<p>Pesan Anda telah terkirim!</p>";
                    }else{
                        echo "Error: ". $sql . "<br>" . $conn->error;
                    }
                
                    $conn->close();
                }
            ?>
            
            

            <form method="post" action="">
                <div class="form-group">
                    <label for="data-nama">Nama:</label>
                    <input type="text" id="data-nama" form="data-nama">
                </div>
                
                <div class="form-group">
                    <label for="data-tanya">Pertayaan</label>
                    <textarea name="data-tanya" id="data-tanya"></textarea>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>

        
    </body>
</html>