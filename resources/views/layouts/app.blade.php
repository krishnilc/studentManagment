<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 100%;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        nav {
            display: flex;
            gap: 2rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Main Container */
        .main-container {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 2rem 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            color: white;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #667eea;
            margin-bottom: 1rem;
        }

        .sidebar-links {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .sidebar-links a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 1rem 1.5rem;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-links a:before {
            content: '→';
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-links a:hover {
            background-color: rgba(102, 126, 234, 0.1);
            border-left-color: #667eea;
            padding-left: 2rem;
        }

        .sidebar-links a:hover:before {
            opacity: 1;
        }

        /* Content Section */
        .content {
            flex: 1;
            padding: 2rem;
            background-color: #f5f5f5;
        }

        .content-header {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .content-header h1 {
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .content-header p {
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .content-body {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 1rem 0;
            }

            .header-container {
                flex-direction: column;
                gap: 1rem;
            }

            nav {
                gap: 1rem;
            }

            .content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <a href="#" class="logo">📚 Student Management</a>
            <nav>
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h3>Quick Links</h3>
            <div class="sidebar-links">
                <a href="#link1">Dashboard</a>
                <a href="#link2">My Profile</a>
                <a href="#link3">Settings</a>
            </div>
        </aside>

        <!-- Content Section -->
        <main class="content">
            <div class="content-header">
                <h1>@yield('page-title', 'Welcome')</h1>
                <p>@yield('page-description', 'Manage your student information efficiently')</p>
            </div>

            <div class="content-body">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
