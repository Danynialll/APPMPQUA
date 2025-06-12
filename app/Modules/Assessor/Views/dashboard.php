<style>
    /* .icon-shape .ni {
         top: 5px !important;
    } */
</style>
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
                            <div class="d-flex mt-2 p-2 <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'bg-light rounded border-start border-primary border-2' : '' ?>">
                                <div>
                                    <div class="icon icon-shape <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'bg-primary' : 'bg-gray-300' ?> shadow-sm text-center border-radius-md" style="width: 32px;">
                                        <i class="ni ni-bell-55 <?= ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0) ? 'text-white' : 'text-dark' ?> opacity-10" aria-hidden="true" style="font-size: 14px;"></i>
                                    </div>
                                </div>
                                <div class="ms-3 w-100">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="numbers">
                                            <h6 class="mb-1 text-dark font-weight-bold">
                                                <?= $notification->n_message ?>
                                            </h6>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-xs text-secondary">
                                                    <?php
                                                    $date = new DateTime($notification->n_created_at);
                                                    $formattedDate = $date->format('d F Y, \a\t h:i A');
                                                    ?><?= $formattedDate ?>
                                                </span>

                                                <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                                    <span class="badge bg-primary text-xs">Unread</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success text-xs">Read</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <?php if ($notification->n_is_read == false || $notification->n_is_read === 'f' || $notification->n_is_read === 0): ?>
                                            <button
                                                class="notification-link btn btn-xs text-primary"
                                                data-id="<?= $notification->n_id ?>"
                                                style="font-size: 11px; padding: 3px 8px; border: 1px solid #ccc; background: white;">
                                                <i class="ni ni-check-bold me-1"></i>Mark read
                                            </button>
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
                                            <?= $assessor_info->asr_name; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <img class="w-50" src="<?= base_url(); ?>/assets/img/logos/emoji.png" alt="image sun">
                                    <!-- <h5 class="mb-0 text-white text-end me-1">Cloudy</h5> -->
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
            <div class="card bg-gradient-info">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">New Assignation</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    <?= $new_samc_assign ?> SAMC
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-folder-17 text-info text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
            <div class="card bg-gradient-warning">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">In Review Progress</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    <?= $review_in_progress ?> SAMC
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-settings text-warning text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-success">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Completed</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    <?= $completed_review ?> SAMC
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-check-bold text-success text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
            <div class="card bg-gradient-danger">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-white text-sm mb-0 text-capitalize font-weight-bold opacity-7">Profit</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    RM <?= $profit ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-white shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-danger text-lg opacity-10" aria-hidden="true"></i>
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
                            class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center text-center"
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

        // Notification Script
        const links = document.querySelectorAll('.notification-link');
        const unreadBadge = document.querySelector('.btn .badge.bg-primary'); // Select the unread notifications badge

        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const notificationId = this.getAttribute('data-id');
                const notificationContainer = this.closest('.notification-item'); // Change to the correct parent class
                const badge = notificationContainer ? notificationContainer.querySelector('.badge') : null;

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
                            // Find the notification container
                            const notificationContainer = this.closest('.d-flex.mt-2.p-2');

                            // Find the badge inside the notification
                            const badge = notificationContainer ? notificationContainer.querySelector('.badge') : null;

                            // ✅ Update the badge text and style to show "Read"
                            if (badge) {
                                badge.classList.remove('bg-primary'); // Remove 'Unread' class
                                badge.classList.add('bg-success'); // Add 'Read' class
                                badge.textContent = 'Read'; // Update text
                            }

                            // ✅ Deduct one from the unread notifications count
                            if (unreadBadge) {
                                let currentCount = parseInt(unreadBadge.textContent, 10);
                                if (currentCount > 0) {
                                    unreadBadge.textContent = currentCount - 1;
                                }
                            }

                            // ✅ Update the notification container styling
                            if (notificationContainer) {
                                notificationContainer.classList.remove('bg-light', 'rounded', 'border-start', 'border-primary', 'border-2');
                            }

                            // ✅ Update the icon color
                            const iconContainer = notificationContainer.querySelector('.icon-shape');
                            if (iconContainer) {
                                iconContainer.classList.remove('bg-primary');
                                iconContainer.classList.add('bg-gray-300');
                            }

                            // ✅ Update the icon text color
                            const icon = iconContainer.querySelector('.ni');
                            if (icon) {
                                icon.classList.remove('text-white');
                                icon.classList.add('text-dark');
                            }

                            // ✅ Hide the "Mark Read" button
                            this.style.display = 'none';

                            // 🔄 **Update CSRF Token in All Forms**
                            if (data.csrf_token) {
                                document.querySelectorAll("input[name='csrf_test_name']").forEach(input => {
                                    input.value = data.csrf_token;
                                });
                            }

                            // ✅ Show SweetAlert message
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

        // Expertise Chart
        // Fetch Chart Data
        fetch("<?= base_url('assessor/getSamcExpertiseData') ?>")
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