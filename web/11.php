<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Submission</title>
    <style>
      .container {
        margin: 50px auto;
        width: 400px;
        padding: 30px;
        border-radius: 10px;
        border: 2px solid black;
      }

      textarea {
        font-size: 12px;
        padding: 10px;
        margin: 5px;
        border-radius: 2px;
        width: 70%;
      }

      input {
        font-size: 12px;
        background-color: gray;
        text-align: center;
        color: white;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Enter Your Information</h2>
      <form action="" method="POST">
        <label for="info">Information:</label><br />
        <textarea id="info" name="info" rows="6" cols="50"></textarea
        ><br /><br />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
      </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $info = $_POST["info"];
        if (!empty($info)) {
            $file = fopen("form.txt", "a"); 
            fwrite($file, $info . "\n");
            fclose($file);
            echo "<script>alert('Information submitted successfully!\\n" . htmlspecialchars($info) . "');</script>";
        } else {
            // Display an error message in an alert if information is empty
            echo "<script>alert('Please enter some information!');</script>";
        }
    }
    ?>
  </body>
</html>
