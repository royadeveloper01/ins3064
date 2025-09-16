<?php
// This is a simple static portfolio website

$portfolioItems = [
    [
        'title' => 'Project 1: My Awesome Blog',
        'description' => 'A dynamic blog platform built with PHP and MySQL, featuring user authentication, post management, and commenting.',
        'image' => 'https://via.placeholder.com/300x200?text=Project+1',
        'link' => 'https://github.com/yourusername/my-awesome-blog'
    ],
    [
        'title' => 'Project 2: E-commerce Store',
        'description' => 'A fully functional e-commerce website developed using Node.js, Express, and MongoDB, with secure payment integration.',
        'image' => 'https://via.placeholder.com/300x200?text=Project+2',
        'link' => 'https://github.com/yourusername/ecommerce-store'
    ],
    [
        'title' => 'Project 3: Task Management App',
        'description' => 'A responsive task management application created with React and Redux, providing real-time updates and drag-and-drop functionality.',
        'image' => 'https://via.placeholder.com/300x200?text=Project+3',
        'link' => 'https://github.com/yourusername/task-management-app'
    ],
    [
        'title' => 'Project 4: Weather Dashboard',
        'description' => 'A weather dashboard that fetches real-time weather data from an API and displays it in an intuitive user interface.',
        'image' => 'https://via.placeholder.com/300x200?text=Project+4',
        'link' => 'https://github.com/yourusername/weather-dashboard'
    ],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300
    &display=swap" rel="stylesheet">
    <style>       
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #35424a;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .portfolio-item {
            background: #ffffff;
            margin: 20px 0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .portfolio-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .portfolio-item h2 {
            margin-top: 0;
        }
        .portfolio-item p {
            line-height: 1.6;
        }
        .portfolio-item a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #35424a;
            border: 1px solid #35424a;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .portfolio-item a:hover {
            background-color: #35424a;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Prince Tech World</h1>
        <h2>Welcome to my Innovation!</h2>
    </header>
    <div class="container">      
        <?php foreach ($portfolioItems as $item): ?>
            <div class="portfolio-item">
                <h2><?php echo htmlspecialchars($item['title']); ?></h2>
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                <p><?php echo htmlspecialchars($item['description']); ?></p>
                <a href="<?php echo htmlspecialchars($item['link']); ?>" target="_blank">View Project</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php   