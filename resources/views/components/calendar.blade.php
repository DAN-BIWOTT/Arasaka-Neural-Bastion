<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyberpunk Arasaka Table</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

        /* General Styles */
        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            margin: 0;
            padding-bottom: 60px; /* Ensures content doesn't overlap with footer */
        }

        /* NAVIGATION */
        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: #111;
            box-shadow: 0 0 10px rgba(255, 0, 60, 0.8);
            position: relative;
            max-width: 95%;
            margin: 20px auto;
            border-radius: 1px;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            transition: all 0.3s ease-in-out;
        }

        .nav-links a {
            color: #ff003c;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
            padding: 8px 12px;
            border-radius: 5px;
            background: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 5px #ff003c;
        }

        .nav-links a:hover {
            color: #000;
            background: #00ffff;
            box-shadow: 0 0 10px #00ffff;
        }

        /* HAMBURGER MENU */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
        }

        .menu-toggle div {
            width: 30px;
            height: 3px;
            background: #ff003c;
            margin: 5px;
            transition: 0.3s;
        }

        /* FLOATING MENU */
        .mobile-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 20px;
            background: #111;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 0, 60, 0.8);
            text-align: left;
        }

        .mobile-menu a {
            display: block;
            color: #ff003c;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .mobile-menu a:hover {
            background: #00ffff;
            color: #000;
            box-shadow: 0 0 10px #00ffff;
        }

        /* TABLE */
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            max-width: 900px;
            margin: auto;
            border-collapse: collapse;
            background: #111;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
            border: 2px solid #ff003c;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ff003c;
            text-align: center;
        }

        th {
            background: #222;
            color: #ff003c;
            font-size: 18px;
        }

        td {
            font-size: 16px;
        }

        .highlight {
            color: #00ffff;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #111;
            padding: 10px;
            text-align: center;
            border-top: 2px solid #ff003c;
            box-shadow: 0 0 10px rgba(255, 0, 60, 0.8);
            font-size: 14px;
        }

        /* MOBILE RESPONSIVENESS */
        @media (max-width: 768px) {
            .nav-container {
                justify-content: space-between;
                padding: 15px 20px;
                max-width: 90%;
                box-shadow: none;

            }

            .nav-links {
                display: none;
            }

            .menu-toggle {
                display: flex;
            }

            .mobile-menu.active {
                display: flex;
            }

            .table-container {
                width: 100%;
                overflow-x: auto;
            }

            table {
                font-size: 14px;
                width: 100%;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVIGATION -->
    <div class="nav-container">
        <div class="menu-toggle" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('arasaka_trading_timeline.analytics') }}">Analytics</a>
        </nav>
        <div class="mobile-menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('arasaka_trading_timeline.analytics') }}">Analytics</a>
        </div>
    </div>

    <h1>Arasaka Trading Systems Report - February 2025</h1>

    <!-- TABLE -->
    <div class="table-container">
        <table>
            <tr>
                <th>February</th>
                <th>Test</th>
                <th colspan="4">Live</th>
                <th>Comment</th>
            </tr>
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th></th>
            </tr>
            <tr>
                <td>Week 1</td>
                <td class="highlight">44.06</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No Trade</td>
            </tr>
            <tr>
                <td>Week 2</td>
                <td class="highlight">41.96</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No Trade</td>
            </tr>
            <tr>
                <td>Week 3</td>
                <td class="highlight">21.46</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>No Trade</td>
            </tr>
            <tr>
                <td>Week 4</td>
                <td class="highlight">170.46</td>
                <td>133.21</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Trade</td>
            </tr>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        &copy; 2025 Arasaka Trading Systems. All Rights Reserved.
    </div>

    <script>
        function toggleMenu() {
            document.querySelector('.mobile-menu').classList.toggle('active');
        }
    </script>

</body>
</html>
