<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Layout</title>
    <?php include './boot_css.php' ?>
    <style>
        .sidebar {
            height: 100vh;
        }

        .nav-item {
            margin: 10px 0;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card h4,
        .card p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 bg-dark text-light sidebar">
                <?php include './sidebar.php' ?>
            </div>

            <!-- Main Content -->
            <div class="col-xl-10 col-lg-9 col-md-8">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h4>Dashboard</h4>
                        <div>
                            <i class="bi bi-bell fs-5 me-3"></i>
                            <i class="bi bi-question-circle fs-5 me-3"></i>
                            <i class="bi bi-envelope fs-5"></i>
                            <span class="ms-4">John David</span>
                        </div>
                    </div>
                </nav>

                <div class="row mt-4 text-center">
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <i class="bi bi-person-fill fs-1 text-warning"></i>
                            <h4>2500</h4>
                            <p>Welcome</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <i class="bi bi-clock-fill fs-1 text-primary"></i>
                            <h4>123.50</h4>
                            <p>Average Time</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <i class="bi bi-cloud-download-fill fs-1 text-success"></i>
                            <h4>1,805</h4>
                            <p>Collections</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <i class="bi bi-chat-dots-fill fs-1 text-danger"></i>
                            <h4>54</h4>
                            <p>Comments</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 text-center">
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <div class="text-primary fs-1">f</div>
                            <h4>35k</h4>
                            <p>Friends</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <div class="text-info fs-1">t</div>
                            <h4>584k</h4>
                            <p>Followers</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <div class="text-info fs-1">in</div>
                            <h4>758+</h4>
                            <p>Contacts</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3">
                            <div class="text-danger fs-1">g+</div>
                            <h4>450</h4>
                            <p>Followers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './boot_js.php'
    ?>
</body>

</html>