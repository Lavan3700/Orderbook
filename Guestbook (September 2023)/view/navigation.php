<!DOCTYPE html>
<html>
<head>
    <style>
        .navbar {
            display: flex;
            background-color: #F0F0F0;
            justify-content: space-between;
            padding: 1em;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 1em;
            padding: 0.5em 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            color: #4CAF50
        }

        .navbar a:hover {
            color: #fff;
            background-color: #4CAF50;
        }

        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo"> 
        <a href="./">Guestbook</a>
    </div>
    <div>
        <a href="./">Home</a>
        <?php if ($this->user->isLoggedIn()) { ?>
            <a href="http://la-guestbook.beta-version.ch/?page=createPost">Post erstellen</a>
            <a href="http://la-guestbook.beta-version.ch/?page=logout">Logout</a>
        <?php } else { ?>
            <a href="http://la-guestbook.beta-version.ch/?page=registern">Registrieren</a>
            <a href="http://la-guestbook.beta-version.ch/?page=login">Login</a>
        <?php }; ?>
    </div>
</div>


</body>
</html>
