<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Toggle with Arrow Button</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for arrow button */
        .toggle-btn {
            cursor: pointer;
        }

        .arrow-up {
            display: none;
        }

        .active .arrow-up {
            display: inline-block;
        }

        .active .arrow-down {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <span class="toggle-btn" data-toggle="collapse" data-target="#collapseContent" aria-expanded="true" aria-controls="collapseContent">
                        <i class="fas fa-arrow-down arrow-down"></i>
                        <i class="fas fa-arrow-up arrow-up"></i>
                        Toggle Content
                    </span>
                </h5>
            </div>
            <div id="collapseContent" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    Content to be toggled goes here.
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle arrow icons on slide toggle
            $('.toggle-btn').click(function() {
                $(this).toggleClass('active');
            });
        });
    </script>

</body>

</html>