<link rel="stylesheet" href="..\css\style.css">
<link rel="stylesheet" href="..\css\zamowienia.css">

<div>
    <div class="orders-container"></div>
    <div class="in-form">
        <button>&lt&lt Powrót do menu</button>
        <input list="time" name="time" class="time-in" placeholder="Podaj godzinę odbioru">
        <datalist id="time">
            <option>8:45 - 8:50</option>
            <option>9:35 - 9:40</option>
            <option>10:25 - 10:35</option>
            <option>11:20 - 11:30</option>
            <option>12:15 - 12:20</option>
            <option>13:05 - 13:25</option>
            <option>14:10 - 14:15</option>
        </datalist>
        <button>Przejdź do płatności >></button>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="..\js\zamowienia.js"></script>