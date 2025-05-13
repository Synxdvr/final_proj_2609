<?php
    // Include database connection
    include 'database/process/db_connection.php';
    
    // Get total books count
    $totalBooks = 0;
    try {
        $sql = "SELECT COUNT(*) as total FROM books_tbl";
        $result = $conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $totalBooks = $row['total'];
        }
    } catch (Exception $e) {
        // If there's an error, leave count at 0
    }

    // Get total requests count
    $totalRequest = 0;
    try {
        $sql = "SELECT COUNT(*) as total FROM request_tbl";
        $result = $conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $totalRequest = $row['total'];
        }
    } catch (Exception $e) {
        // If there's an error, leave count at 0
    }
    
    // Get books borrowed by day for current month
    $booksBorrowedData = [];
    $booksReturnedData = [];
    $dateLabels = [];
    try {
        // Get current month data (using proper date formatting)
        $currentMonth = date('m');
        $currentYear = date('Y');
        $daysInMonth = date('t'); // Gets number of days in current month
        
        // Initialize all days to zero
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $day = str_pad($i, 2, '0', STR_PAD_LEFT);
            $dateLabels[] = "$day/$currentMonth";
            $booksBorrowedData[$i] = 0;
            $booksReturnedData[$i] = 0;
        }
        
        // Query to get count of books borrowed by day of month
        $sql = "SELECT DAY(date_borrowed) as day, COUNT(*) as count 
                FROM request_tbl 
                WHERE MONTH(date_borrowed) = $currentMonth 
                AND YEAR(date_borrowed) = $currentYear 
                AND status = 'approved'
                GROUP BY DAY(date_borrowed)";
        
        $result = $conn->query($sql);
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $day = (int)$row['day'];
                $booksBorrowedData[$day] = (int)$row['count'];
            }
        }
        
        // Query to get count of books returned by day of month
        $sql = "SELECT DAY(date_returned) as day, COUNT(*) as count 
                FROM request_tbl 
                WHERE MONTH(date_returned) = $currentMonth 
                AND YEAR(date_returned) = $currentYear 
                AND status = 'returned'
                GROUP BY DAY(date_returned)";
        
        $result = $conn->query($sql);
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $day = (int)$row['day'];
                $booksReturnedData[$day] = (int)$row['count'];
            }
        }
        
        // Convert to indexed array for Chart.js
        $booksBorrowedData = array_values($booksBorrowedData);
        $booksReturnedData = array_values($booksReturnedData);
        
    } catch (Exception $e) {
        // If there's an error, leave with empty arrays
    }
    
    // Also get total borrowed books
    $totalBorrowed = 0;
    try {
        $sql = "SELECT COUNT(*) as total FROM request_tbl WHERE status = 'approved'";
        $result = $conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $totalBorrowed = $row['total'];
        }
    } catch (Exception $e) {
        // If there's an error, leave count at 0
    }
    
    // Also get total returned books
    $totalReturned = 0;
    try {
        $sql = "SELECT COUNT(*) as total FROM request_tbl WHERE status = 'returned'";
        $result = $conn->query($sql);
        
        if ($result && $row = $result->fetch_assoc()) {
            $totalReturned = $row['total'];
        }
    } catch (Exception $e) {
        // If there's an error, leave count at 0
    }
    
    $conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="dashboard_admin.css">
    <!-- Add Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="resources/BOOKSYTE.png" alt="Booksyte Logo">
        </div>
        <nav>
            <a href="dashboard_admin.php" class="active">
                <img src="resources/4.png" alt="Dashboard Icon">Dashboard
            </a>
            <a href="aBorrowRet_a.php">
                <img src="resources/5.png" alt="Borrow/Return Icon">Borrow/Return
            </a>
            <a href="book_catalog_admin.php">
                <img src="resources/6.png" alt="Catalog Icon">Book Catalog
            </a>
            <a href="account_admin.php">
                <img src="resources/7.png" alt="Account Icon">Account
            </a>
        </nav>
    </div>

    <div class="main-content">
        <h2>LIBRARY MANAGEMENT SYSTEM</h2>
        <div class="top-section">
            <div class="welcome-header">
                <h3>Welcome back, Admin!</h3>
                <div class="profile-icon">
                    <img src="resources\7.png" alt="User Profile">
                </div>
            </div>
               <div class="dashboard-cards">
                    <div class="card">
                        <h4>Total Books</h4>
                        <p id="book-count"><?php echo $totalBooks; ?></p>
                    </div>

                  <div class="card">
                      <h4>Books Borrowed</h4>
                      <p><?php echo $totalBorrowed; ?></p>
                  </div>
                  <div class="card">
                        <h4>Books Returned</h4>
                        <p id="returned-count"><?php echo $totalReturned; ?></p>
                    </div>
                  <div class="card">
                        <h4>Total Requests</h4>
                        <p id="Requests-count"><?php echo $totalRequest; ?></p>
                    </div>
                  <div class="big-card">
                      <h4>Books Borrowed per Day This Month</h4>
                      <div class="graph-container">
                          <canvas id="borrowChart"></canvas>
                      </div>
                  </div>
                  <div class="big-card">
                      <h4>Books Returned per Day This Month</h4>
                      <div class="graph-container">
                          <canvas id="returnChart"></canvas>
                      </div>
                  </div>
              </div>
        </div>
    </div>
    
    <script>
        // Chart initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Borrow Chart
            const borrowCtx = document.getElementById('borrowChart').getContext('2d');
            
            // Chart data from PHP
            const labels = <?php echo json_encode($dateLabels); ?>;
            const borrowData = <?php echo json_encode($booksBorrowedData); ?>;
            
            const borrowChart = new Chart(borrowCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Books Borrowed',
                        data: borrowData,
                        backgroundColor: 'rgba(40, 209, 156, 0.2)',
                        borderColor: 'rgba(40, 209, 156, 1)',
                        borderWidth: 3,
                        pointBackgroundColor: 'rgba(40, 209, 156, 1)',
                        pointBorderColor: '#fff',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 15,
                                font: {
                                    family: 'Poppins',
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(26, 32, 44, 0.9)',
                            titleFont: {
                                family: 'Poppins',
                                size: 14
                            },
                            bodyFont: {
                                family: 'Poppins',
                                size: 13
                            },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                title: function(tooltipItems) {
                                    return 'Day: ' + tooltipItems[0].label;
                                },
                                label: function(context) {
                                    return 'Books Borrowed: ' + context.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 11
                                },
                                maxRotation: 45,
                                minRotation: 45
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 11
                                },
                                precision: 0
                            }
                        }
                    }
                }
            });
            
            // Return Chart
            const returnCtx = document.getElementById('returnChart').getContext('2d');
            const returnData = <?php echo json_encode($booksReturnedData); ?>;
            
            const returnChart = new Chart(returnCtx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Books Returned',
                        data: returnData,
                        backgroundColor: 'rgba(74, 111, 214, 0.2)',
                        borderColor: 'rgba(74, 111, 214, 1)',
                        borderWidth: 3,
                        pointBackgroundColor: 'rgba(74, 111, 214, 1)',
                        pointBorderColor: '#fff',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                boxWidth: 15,
                                font: {
                                    family: 'Poppins',
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(26, 32, 44, 0.9)',
                            titleFont: {
                                family: 'Poppins',
                                size: 14
                            },
                            bodyFont: {
                                family: 'Poppins',
                                size: 13
                            },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                title: function(tooltipItems) {
                                    return 'Day: ' + tooltipItems[0].label;
                                },
                                label: function(context) {
                                    return 'Books Returned: ' + context.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 11
                                },
                                maxRotation: 45,
                                minRotation: 45
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                font: {
                                    family: 'Poppins',
                                    size: 11
                                },
                                precision: 0
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>