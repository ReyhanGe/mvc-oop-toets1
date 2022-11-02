<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insanlar</title>
</head>

<body>
    <h3><?= $data['title']; ?> </h3>

    <table>
        <thead>
            <th>Naam</th>
            <th>Vermogen</th>
            <th>Leeftijd</th>
            <th>Bedrijf</th>
            <th>delete</th>
        </thead>
        <tbody>
            <?= $data['insanlar']; ?>
        </tbody>
    </table>
    <a href="<?= URLROOT; ?>/homepages/index">terug</a>
</body>

</html>