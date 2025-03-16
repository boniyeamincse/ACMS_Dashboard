<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ACMS - Dashboard</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <?php include 'partials/sidebar.php'; ?>
    <div class="main-content">
        <h1>Dashboard</h1>
        <div class="stats">
            <div class="stat-item">
                <h3>Total Students</h3>
                <p id="total-students">0</p>
            </div>
            <div class="stat-item">
                <h3>Admit Cards Generated</h3>
                <p id="admit-cards-generated">0</p>
            </div>
            <div class="stat-item">
                <h3>Pending Requests</h3>
                <p id="pending-requests">0</p>
            </div>
            <div class="stat-item">
                <h3>Upcoming Exams</h3>
                <p id="upcoming-exams">0</p>
            </div>
        </div>
        <div class="recent-activities">
            <h2>Recent Activities</h2>
            <ul id="recent-activities-list">
                <!-- Recent activities will be populated here -->
            </ul>
        </div>
        <div class="notifications">
            <h2>Notifications</h2>
            <ul id="notifications-list">
                <!-- Notifications will be populated here -->
            </ul>
        </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <script src="assets/js/scripts.js"></script>
</body>
</html>