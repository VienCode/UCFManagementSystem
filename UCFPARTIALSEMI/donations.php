<?php
// donations.php

// Sample data - replace with your database queries
$totalTithes = 235000.00;
$renovationCost = 1540000.00;
$electricBill = 2363.01;
$waterBill = 663.21;

// Sample donations data - replace with database query
$donations = [
    [
        'id' => 1,
        'donor_name' => 'John Dela Cruz',
        'amount' => 5000.00,
        'type' => 'Tithe',
        'date' => '2025-07-20',
        'contact' => '09123456789'
    ],
    [
        'id' => 2,
        'donor_name' => 'Maria Santos',
        'amount' => 3000.00,
        'type' => 'Offering',
        'date' => '2025-07-18',
        'contact' => '09987654321'
    ],
    [
        'id' => 3,
        'donor_name' => 'Anonymous',
        'amount' => 10000.00,
        'type' => 'Special Offering',
        'date' => '2025-07-15',
        'contact' => 'N/A'
    ]
];

// Handle form submissions
if ($_POST) {
    if (isset($_POST['add_donation'])) {
        // Handle add donation
        // Insert into database logic here
        echo "<script>alert('Donation added successfully!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unity Christian Fellowship - Donations</title>
    <link rel="stylesheet" href="donations.css">
</head>
<body>
    <aside class="sidebar">
      <div class="logo">
        <img src="assets/logo.png" alt="Logo">
      </div>
      <nav>
        <ul>
          <li>
            <a href="#">
              <img src="assets/pictureuser.png" alt="User Account Icon">
              Account Name
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/user-check.png" alt="User Check Icon">
              Attendance
            </a>
          </li>
          <li>
            <a href="evangelismmain.php">
              <img src="assets/mass.png" alt="Evangelism Icon">
              Evangelism
            </a>
          </li>
          <li class="active">
            <a href="donations.php">
              <img src="assets/donate.png" alt="Donations Icon">
              Donations
            </a>
          </li>
          <li>
            <a href="churchupdates.php">
              <img src="assets/announcement.png" alt="Updates Icon">
              Church Updates
            </a>
          </li>
          <li>
            <a href="#">
              <img src="assets/group.png" alt="Group Icon">
              Cell Group<br>Management
            </a>
          </li>
        </ul>
      </nav>
    </aside>

    <main class="main-content">
      <header class="header">
        <h1><span class="pursuit">Unity</span> <span class="of">Christian</span> <span class="truth">Fellowship</span></h1>
        <p class="verse">Donations Accounting View</p>
      </header>
        <div class="content">
                <!-- Summary Section -->
                <div class="donations-summary">
                    <h2 class="summary-title">TOTAL AMOUNT COLLECTED FROM TITHES AND OFFERING AS OF <?php echo strtoupper(date('F j, Y')); ?></h2>
                    <div class="total-amount">PHP <?php echo number_format($totalTithes, 2); ?></div>
                    
                    <div class="expenses-grid">
                        <div class="expense-item">
                            <div class="expense-label">Ongoing Project Renovation Estimated Amount</div>
                            <div class="expense-amount">PHP <?php echo number_format($renovationCost, 2); ?></div>
                        </div>
                        <div class="expense-item">
                            <div class="expense-label">Electric Expense Amount for This Month (<?php echo strtoupper(date('F')); ?>)</div>
                            <div class="expense-amount">PHP <?php echo number_format($electricBill, 2); ?></div>
                        </div>
                        <div class="expense-item full-width">
                            <div class="expense-label">Water Bill for This Month (<?php echo strtoupper(date('F')); ?>)</div>
                            <div class="expense-amount">PHP <?php echo number_format($waterBill, 2); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Chart Section -->
                <div class="chart-container">
                    <h3 class="chart-title">Monthly Donations Overview</h3>
                    <div class="chart-placeholder">
                        Chart will be implemented here
                        <br><small>(Consider using Chart.js or similar library)</small>
                    </div>
                </div>

                <!-- Donations Management Section -->
                <div class="donations-table-section">
                    <div class="section-header">
                        <h3 class="section-title">DONATIONS MANAGEMENT</h3>
                        <input type="text" class="search-box" placeholder="Search donations..." id="searchDonations">
                    </div>

                    <!-- Add Donation Form -->
                    <form method="POST" action="">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="donor_name">Donor Name</label>
                                <input type="text" class="form-control" id="donor_name" name="donor_name" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="donation_type">Type</label>
                                <select class="form-control" id="donation_type" name="donation_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Tithe">Tithe</option>
                                    <option value="Offering">Offering</option>
                                    <option value="Special Offering">Special Offering</option>
                                    <option value="Building Fund">Building Fund</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="donation_date">Date</label>
                                <input type="date" class="form-control" id="donation_date" name="donation_date" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Phone number">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_donation" class="btn-primary">Add Donation</button>
                            </div>
                        </div>
                    </form>

                    <!-- Donations Table -->
                    <table class="donations-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Donor Name</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="donationsTableBody">
                            <?php foreach ($donations as $donation): ?>
                            <tr>
                                <td><?php echo $donation['id']; ?></td>
                                <td><?php echo htmlspecialchars($donation['donor_name']); ?></td>
                                <td>PHP <?php echo number_format($donation['amount'], 2); ?></td>
                                <td><?php echo htmlspecialchars($donation['type']); ?></td>
                                <td><?php echo date('Y-m-d', strtotime($donation['date'])); ?></td>
                                <td><?php echo htmlspecialchars($donation['contact']); ?></td>
                                <td>
                                    <button class="btn-sm btn-success" onclick="editDonation(<?php echo $donation['id']; ?>)">Edit</button>
                                    <button class="btn-sm btn-danger" onclick="deleteDonation(<?php echo $donation['id']; ?>)">Delete</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    <script>
        // Search functionality
        document.getElementById('searchDonations').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#donationsTableBody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Edit donation function
        function editDonation(id) {
            // Implement edit functionality
            alert('Edit donation ID: ' + id);
        }

        // Delete donation function
        function deleteDonation(id) {
            if (confirm('Are you sure you want to delete this donation?')) {
                // Implement delete functionality
                window.location.href = 'donations.php?delete=' + id;
            }
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const amount = document.getElementById('amount').value;
            if (amount <= 0) {
                e.preventDefault();
                alert('Please enter a valid amount greater than 0');
            }
        });
    </script>
</body>
</html>
