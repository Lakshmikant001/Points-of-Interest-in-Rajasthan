<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>How Website Works - POI Web</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #f0f4f8, #dfe9f3);
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: linear-gradient(to right, #f44336, #ff9800);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.1rem;
            margin-top: 0.3rem;
        }

        /* Logo */
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Video Section */
        .video-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
            padding: 20px;
            overflow-y: auto;
        }

        .video-frame {
            position: relative;
            width: 100%;
            max-width: 960px;
            max-height: 75vh;
            border: 12px solid #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .video-frame:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 48px rgba(0, 0, 0, 0.2);
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Footer */
        footer {
            text-align: center;
            background-color: #0d47a1;
            color: white;
            padding: 1.5rem;
            font-size: 0.95rem;
            margin-top: 2rem;
        }

        /* Responsive Styling */
        @media (max-width: 1024px) {
            .header h1 {
                font-size: 2.2rem;
            }

            .video-frame {
                max-width: 90%;
                max-height: 70vh;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .video-frame {
                max-width: 100%;
                max-height: 60vh;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.6rem;
            }

            .header p {
                font-size: 0.95rem;
            }

            footer {
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header with Logo and Title -->
    <div class="header">
        <a href="index.php" class="logo">
            <img src="logo111.png" alt="POI Web Logo" />
        </a>
        <h1>How This Website Works</h1>
        <p>Watch this video to learn about exploring and contributing to Rajasthan POI</p>
    </div>

    <!-- Video Section -->
    <section class="video-container">
        <div class="video-frame">
            <video controls autoplay muted>
                <source src="videos/how_it_works.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <footer>
        &copy; 2025 Rajasthan POI. All Rights Reserved.
    </footer>

</body>
</html>
