<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>limbo payment Gateway</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    </style>
</head>

<body>

    <h3>Limbo payment Form</h3>
    <form action="pay.php" method="POST">
       
    <label>phone</label>
        <!-- <input type="text" name="phone">
        <br>

        <br>
        <label>Amount</label>
        <input type="number" name="amount">
        <br> -->
        <input type="submit" name="pay" value="Send Payment">
    </form>
    </div>

</body>

</html>