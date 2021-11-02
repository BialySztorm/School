<link rel="stylesheet" href="..\css\platnosc.css">
<link rel="stylesheet" href="..\css\style.css">

<div class="container">
    <h1></h1>
    <form action="pay-check.php" method="GET">
        <input name="BLIK" type="number" placeholder="Kod BLIK" max="999999"></input>
        <input name="orderString" type="hidden">
        <input name="time" type="hidden">
        <button type="submit">Potwierdź płatność</button>
    </form>
    <h1>Lub</h1>
    <button class="odbiorBtn">Zapłać przy odbiorze</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="..\js\platnosc.js"></script>