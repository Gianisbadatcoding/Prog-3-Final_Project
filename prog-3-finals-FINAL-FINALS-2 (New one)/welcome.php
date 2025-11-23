<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to Inconvenience Store Management System">
    <title>Welcome - INCONVINIENCE STORE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .welcome-page {
            background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .welcome-wrapper {
            width: 100%;
            max-width: 600px;
        }

        .welcome-container {
            background: white;
            border-radius: 20px;
            padding: 48px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        .welcome-header {
            margin-bottom: 40px;
        }

        .welcome-logo {
            font-size: 80px;
            margin-bottom: 24px;
            color: #0ea5e9;
        }

        .welcome-header h1 {
            color: #0369a1;
            font-size: 36px;
            font-weight: 600;
            margin: 0 0 12px 0;
            border: none;
            padding: 0;
        }

        .welcome-header h2 {
            color: #6b7280;
            font-size: 20px;
            font-weight: 400;
            margin: 0 0 8px 0;
        }

        .welcome-header p {
            color: #6b7280;
            font-size: 16px;
            margin: 24px 0 0 0;
            line-height: 1.6;
        }

        .welcome-features {
            margin: 40px 0;
            text-align: left;
        }

        .features-title {
            color: #0369a1;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 24px;
            text-align: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(14, 165, 233, 0.15);
            border-color: #0ea5e9;
        }

        .feature-icon {
            font-size: 32px;
            color: #0ea5e9;
            margin-bottom: 12px;
        }

        .feature-title {
            font-size: 14px;
            font-weight: 600;
            color: #0369a1;
            margin: 0;
        }

        .welcome-actions {
            margin-top: 40px;
        }

        .btn-welcome {
            display: inline-block;
            width: 100%;
            padding: 16px 32px;
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-welcome:hover {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(14, 165, 233, 0.4);
        }

        .btn-welcome i {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .welcome-container {
                padding: 32px 24px;
            }

            .welcome-logo {
                font-size: 64px;
            }

            .welcome-header h1 {
                font-size: 28px;
            }

            .welcome-header h2 {
                font-size: 18px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="welcome-page">
    <div class="welcome-wrapper">
        <div class="welcome-container">
            <div class="welcome-header">
                <div class="welcome-logo"><i class="fas fa-store"></i></div>
                <h1>Inconvinience Store</h1>
                <h2>Store Management System</h2>
                <p>Streamline your inventory management with our comprehensive store management solution. Track products, monitor stock levels, and manage your store efficiently.</p>
            </div>

            <div class="welcome-features">
                <h3 class="features-title">Key Features</h3>
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fas fa-boxes"></i></div>
                        <h4 class="feature-title">Inventory Management</h4>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fas fa-chart-line"></i></div>
                        <h4 class="feature-title">Real-time Analytics</h4>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fas fa-bell"></i></div>
                        <h4 class="feature-title">Stock Alerts</h4>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon"><i class="fas fa-users"></i></div>
                        <h4 class="feature-title">User Management</h4>
                    </div>
                </div>
            </div>

            <div class="welcome-actions">
                <a href="login.php" class="btn-welcome">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Get Started - Login</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>

