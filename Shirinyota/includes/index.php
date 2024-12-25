<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIRINYOTA Stock Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('stock-management.jpg');
            background-size: cover;
            color: white;
        }
        nav {
            background: rgba(0, 0, 0, 0.8);
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        nav a:hover {
            color: aqua;
            text-decoration: underline;
        }
        #clock {
            color: aqua;
            font-size: 16px;
        }
        h2 {
            text-align: center;
            margin-top: 150px;
            font-size: 2.5rem;
        }
        .content {
            text-align: center;
            margin-top: 30px;
        }
        button, textarea {
            padding: 10px 20px;
            font-size: 16px;
        }
        .feedback-section {
            margin: 30px auto;
            text-align: center;
        }
        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="index.php"><i class="fas fa-home"></i> Home</a>
            <a href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a>
            <a href="services.php"><i class="fas fa-cogs"></i> Services</a>
            <?php if ($isLoggedIn): ?>
                <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
            <?php endif; ?>
        </div>
        <div id="clock"></div>
    </nav>

    <h2>WELCOME TO SHIRINYOTA STOCK</h2>

    <div class="content">
        <?php if ($isLoggedIn): ?>
            <p>Hello, <?= $_SESSION['user_id']; ?>!</p>
            <p><a href="stock_status.php">View Stock Status</a></p>
            <p><a href="stock_in.php">Record Stock In</a></p>
            <p><a href="stock_out.php">Record Stock Out</a></p>
        <?php else: ?>
            <p>Please <a href="login.php">login</a> to manage stock.</p>
        <?php endif; ?>
    </div>

    <div class="feedback-section">
        <h3>Feedback</h3>
        <form action="feedback.php" method="post">
            <textarea name="feedback" placeholder="Write your feedback here..." rows="4" cols="50"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <footer>
        &copy; <?= date("Y"); ?> SHIRINYOTA Stock Management. All Rights Reserved.
    </footer>

    <script>
        // Real-Time Clock
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString();
            document.getElementById('clock').innerText = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
