<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại Xét Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
        }
        .container {
            height: 650px;
            position: relative;
            width: 600px;
            background-color: #fff;
            padding: 1rem;
            margin-top: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .loaixn {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 1rem;
            border-bottom: 2px solid #007bff;
        }
        .back-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            cursor: pointer;
        }
        .test-type {
            padding: 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<div class="container my-4">
    <div class="loaixn">
        <a href="?index.php"><span class="back-icon">&larr;</span></a>
        <h5 class="mb-0">Loại xét nghiệm</h5>
    </div>

    <div class="mt-3">
        <div class="test-type">
            <a class="mb-0" href="?dkxn2">Xét nghiệm AMH</a>
        </div>
        <div class="test-type">
            <a class="mb-0" href="?dkxn2">Xét nghiệm Máu</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>