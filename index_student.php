<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="C:/xampp/htdocs/Final_Project/Nova_css/Nova/assets/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Student Module</title>
</head>
<body>
    <div class="container">
        <h1>Student Module</h1>
        <p>Welcome, [Student Name]!</p>
        <div class="form-group">
            <label for="question">Question:</label>
            <textarea class="form-control" id="question" rows="3" readonly>[Question Text]</textarea>
        </div>
        <div class="form-group">
            <label for="response">Your Response:</label>
            <textarea class="form-control" id="response" rows="3"></textarea>
        </div>
        <button class="btn btn-primary">Submit Response</button>
    </div>
</body>
</html>
