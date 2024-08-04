<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webapp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center">Users table</h1><hr>
            <a class="btn btn-primary" onclick="open_modal_create()">+ Create</a>
        </div><hr>
        
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th style="width: 250px;">Action</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>

    <?php include('./modal.php'); ?>

    <?php include('./link.php'); ?>

</body>
</html>