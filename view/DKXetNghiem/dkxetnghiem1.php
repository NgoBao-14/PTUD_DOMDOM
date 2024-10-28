<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại Xét Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
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
    </style>
</head>
<body>

<div class="container my-4">
    <div class="header">
        <span class="back-icon">&larr;</span>
        <h5 class="mb-0">Loại xét nghiệm</h5>
    </div>

    <div class="mt-3">
        <div class="test-type">
            <p class="mb-0">Xét nghiệm AMH</p>
        </div>
        <div class="test-type">
            <p class="mb-0">Xét nghiệm Máu</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>