<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header d-flex align-items-center bg-gradient-primary justify-content-between pb-0 p-3">
                    <h5 class="mb-3">Memo</h5>
                    <div class="nav-wrapper position-relative">
                        <button type="button" class="btn btn-default bg-white d-flex align-items-center mb-2">
                            <span>Unread messages</span>
                            <span class="badge bg-primary ms-2"><?= $unread_notifications ?></span>
                        </button>
                    </div>
                </div>
                <div class="card-body border-radius-lg p-3 my-2" style="height:420px; overflow:auto;">
                    <?= csrf_field() ?>
                    <?php if ($unread_notifications == '0'): ?>
                        <div class="empty-notification p-4">
                            <center>
                                <img src="<?= base_url('assets/img/icons/thumbs_up.png') ?>" alt="No Notifications" class="mb-3" style="max-width: 300px;">
                            </center>
                            <p class="text-muted text-center">
                                You have no notifications at the moment. Check back later!
                            </p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($notifications as $notification): ?>
                            <div class="d-flex mt-3">
                                <div>
                                    <div class="icon icon-shape bg-primary-soft shadow text-center border-radius-md shadow-none">
                                        <i class="ni ni-bell-55 text-lg text-primary text-gradient opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <div class="numbers">
                                        <h6 class="mb-1 text-dark text-sm">
                                            <a href="#"
                                                class="notification-link"
                                                data-id="<?= $notification->n_id ?>"
                                                style="text-decoration: none; color: inherit;">
                                                <?= $notification->n_message ?>
                                            </a>
                                        </h6>
                                        <span class="text-sm">
                                            <?php
                                            $date = new DateTime($notification->n_created_at);
                                            $formattedDate = $date->format('d F Y, \a\t h:i A');
                                            ?><?= $formattedDate ?>
                                        </span>

                                        <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                            <span class="badge badge-primary">Unread</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Read</span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-gradient-primary">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8 my-auto">
                                    <div class="numbers">
                                        <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Welcome Back!</p>
                                        <h5 class="text-white font-weight-bolder mb-0">
                                            <?= $admin_info->qa_name; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <img class="w-50" src="<?= base_url('') ?>assets/img/small-logos/icon-sun-cloud.png" alt="image sun">
                                    <h5 class="mb-0 text-white text-end me-1">Cloudy</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status1" countto="21">21</span> <span class="text-lg ms-n2">°C</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Total Active</h6>
                            <p class="opacity-8 mb-0 text-sm">SAMC</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"> <span id="status2" countto="44">44</span> <span class="text-lg ms-n1">%</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Total In Process</h6>
                            <p class="opacity-8 mb-0 text-sm">SAMC</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status3" countto="87">87</span> <span class="text-lg ms-n2">m³</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Total Income</h6>
                            <p class="opacity-8 mb-0 text-sm">SAMC</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-primary"><span id="status4" countto="417">417</span> <span class="text-lg ms-n2">GB</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Total Unassigned</h6>
                            <p class="opacity-8 mb-0 text-sm">SAMC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Today's Trip</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    145 Km
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Battery Health</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    99 %
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-controller text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Average Speed</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    56 Km/h
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-delivery-fast text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Music Volume</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    15/100
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-note-03 text-dark text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mt-lg-0 mt-4">
            <div class="card z-index-2 position-relative">
                <div class="card-header p-3 pb-0">
                    <h6>Assessor Expertise Barchart</h6>
                </div>
                <div class="card-body p-3 position-relative">
                    <div class="chart position-relative">
                        <canvas id="bar-chart-horizontal" class="chart-canvas" height="300"></canvas>
                        <!-- Backdrop for Empty Data -->
                        <div id="empty-data-backdrop"
                            class="position-absolute top-0 start-0 w-100 h-100  align-items-center justify-content-center text-center"
                            style="background: rgba(0, 0, 0, 0.5); color: white; font-size: 18px; display: none;">
                            No data available
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('') ?>assets/js/plugins/chartjs.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.btn .badge.bg-primary'); // Select the unread notifications badge

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationContainer = this.closest('.numbers'); // Find the parent container
                const badge = notificationContainer.querySelector('.badge'); // Find the badge inside the parent container

                // Send AJAX request to mark the notification as read
                fetch('<?= base_url("qvcAdmin/notifications/markAsRead") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded', // Ensure proper encoding
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams({
                            id: notificationId,
                            csrf_test_name: document.querySelector("input[name='csrf_test_name']").value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the badge text and style to show "Read"
                            if (badge) {
                                badge.classList.remove('badge-primary'); // Remove 'Unread' class
                                badge.classList.add('badge-success'); // Add 'Read' class
                                badge.textContent = 'Read'; // Update text to "Read"
                            }

                            // Deduct one from the unread notifications count
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;
                                }
                            }

                            // 🔄 **Update CSRF Token in All Forms**
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // Show SweetAlert message
                            Swal.fire({
                                title: 'Notification Read',
                                text: 'The notification has been marked as read.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Failed to mark notification as read.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while marking the notification as read.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    });
            });
        });

        // Fetch Chart Data
        fetch("<?= base_url('qvcAdmin/getSamcExpertiseData') ?>")
            .then(response => response.json())
            .then(data => {
                var ctx6 = document.getElementById("bar-chart-horizontal").getContext("2d");
                var backdrop = document.getElementById("empty-data-backdrop");

                if (!data.data || data.data.length === 0) {
                    // Show Backdrop if Data is Empty
                    backdrop.style.display = "flex";
                } else {
                    // Hide Backdrop if Data is Available
                    backdrop.style.display = "none";

                    // Render Chart
                    new Chart(ctx6, {
                        type: "bar",
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: "Samc by Expertise",
                                weight: 5,
                                borderWidth: 0,
                                borderRadius: 4,
                                backgroundColor: [
                                    '#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#FFD700', '#A833FF'
                                ],
                                data: data.data,
                                fill: false
                            }],
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false,
                                }
                            },
                            scales: {
                                y: {
                                    grid: {
                                        drawBorder: false,
                                        display: true,
                                        drawOnChartArea: true,
                                        drawTicks: false,
                                        borderDash: [5, 5]
                                    },
                                    ticks: {
                                        display: true,
                                        padding: 10,
                                        color: '#9ca2b7'
                                    }
                                },
                                x: {
                                    grid: {
                                        drawBorder: false,
                                        display: false,
                                        drawOnChartArea: true,
                                        drawTicks: true,
                                    },
                                    ticks: {
                                        display: true,
                                        color: '#9ca2b7',
                                        padding: 10,
                                        stepSize: 1,
                                        beginAtZero: true
                                    }
                                },
                            },
                        },
                    });
                }
            })
            .catch(error => {
                console.error("Error fetching chart data:", error);
                document.getElementById("empty-data-backdrop").style.display = "flex";
            });
    });
</script>