<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
            font-size: 14px;
            font-family: sans-serif;
        }

        .container {
            box-sizing: border-box;
            width: 960px;
            max-width: 100%;
            margin: 60px auto;
            padding: 0 15px;
        }

        h1 {
            font-size: 22px;
            font-weight: normal;
            margin-bottom: 45px;
        }

        h2 {
            font-size: 14px;
        }

        section {
            margin-bottom: 30px;
        }

        pre {
            border: 1px solid #eee;
            background: #fafafa;
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Hello world from website service <?php echo $hostname ?></h1>

    <?php foreach ($requests as $request) : ?>
        <section>
            <h2><?php echo $request['title'] ?></h2>
            <pre><?php echo $request['content'] ?></pre>
        </section>
    <?php endforeach ?>

    <form action="" method="post">
        <input type="submit" name="createorder" value="Create Order">
    </form>

</div>
</body>
</html>