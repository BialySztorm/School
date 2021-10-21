// Implementacja zmiennej zmieniającą zadania
var task;
// Implementacja tablicy z zadaniami
var tasks = [
    "task01 Kelner - 20 powtórzeń ???",
    "task02 Wyciąganie łopatek - 20s 1/5 20s",
    "task02 Wyciąganie łopatek - 20s 2/5 20s",
    "task02 Wyciąganie łopatek - 20s 3/5 20s",
    "task02 Wyciąganie łopatek - 20s 4/5 20s",
    "task02 Wyciąganie łopatek - 20s 5/5 20s",
    "task03 Jednonóż przy ścianie z 5 kg obciążenia - 45s 1/4 45s",
    "task03 Jednonóż przy ścianie z 5 kg obciążenia - 45s 2/4 45s",
    "task03 Jednonóż przy ścianie z 5 kg obciążenia - 45s 3/4 45s",
    "task03 Jednonóż przy ścianie z 5 kg obciążenia - 45s 4/4 45s",
    "task04 Piramidka - 10 powtórzeń z 5s pauzy u góry 1/3 ???",
    "task04 Piramidka - 10 powtórzeń z 5s pauzy u góry 2/3 ???",
    "task04 Piramidka - 10 powtórzeń z 5s pauzy u góry 3/3 ???",
    "task05 Martwy robak - 45s 1/3 45s",
    "task05 Martwy robak - 45s 2/3 45s",
    "task05 Martwy robak - 45s 3/3 45s",
    "task06 Przekładanie ciężarka - 20 powtórzeń 1/3 ???",
    "task07 Deska bokiem z wysuwaniem hantli - 45s 1/3 45s",
    "task08 Brzuszki z obciążeniem 2,5kg - 12 powtórzeń 1/3 ???",
    "task06 Przekładanie ciężarka - 20 powtórzeń 2/3 ???",
    "task07 Deska bokiem z wysuwaniem hantli - 45s 2/3 45s",
    "task08 Brzuszki z obciążeniem 2,5kg - 12 powtórzeń 2/3 ???",
    "task06 Przekładanie ciężarka - 20 powtórzeń 3/3 ???",
    "task07 Deska bokiem z wysuwaniem hantli - 45s 3/3 45s",
    "task08 Brzuszki z obciążeniem 2,5kg - 12 powtórzeń 3/3 ???",
    "task09 Krok odstawno-dostawny w pozycji lekkiego kelnera - 1,5min 1/3 90s",
    "task09 Krok odstawno-dostawny w pozycji lekkiego kelnera - 1,5min 2/3 90s",
    "task09 Krok odstawno-dostawny w pozycji lekkiego kelnera - 1,5min 3/3 90s",
    "task10 Wykroki i zakroki z obciążeniem 5kg - 2min 1/3 120",
    "task10 Wykroki i zakroki z obciążeniem 5kg - 2min 2/3 120",
    "task10 Wykroki i zakroki z obciążeniem 5kg - 2min 3/3 120"
];
// Ustawienie strony startowej
function start() {
    task = 1
    document.getElementById("tasks").style.backgroundImage = "url('grafika/" + tasks[task - 1].slice(0, 6) + ".png')";
    document.getElementById("audio").src = "audio/" + tasks[task - 1].slice(-3) + ".ogg";
    document.getElementById("audio").src = "audio/" + tasks[task - 1].slice(-3) + ".mp3";
    document.getElementById("task").value = tasks[task - 1].slice(7, -4);
}
// Odświeżanie zadań bez odświeżania strony
function tasksRefresh() {
    start();
    document.getElementById("timer").src = "timer.html";
}
// Ustwaienie zadań po zatwierdzeniu poprzedniego
function check() {
    if (task < tasks.length) {
        task++;
        document.getElementById("tasks").style.backgroundImage = "url('grafika/" + tasks[task - 1].slice(0, 6) + ".png')";
        document.getElementById("audio").src = "audio/" + tasks[task - 1].slice(-3) + ".ogg";
        document.getElementById("audio").src = "audio/" + tasks[task - 1].slice(-3) + ".mp3";
        document.getElementById("task").value = tasks[task - 1].slice(7, -4);
    }
    else {
        document.getElementById("tasks").style.backgroundImage = "url('grafika/end.png')";
        document.getElementById("audio").src = "audio/end.mp3";
        document.getElementById("audio").src = "audio/end.ogg";
        document.getElementById("task").value = "Koniec";
    }
}
function cofnij(){
    if(task>1){
        task-=2;
        check();
    }
}

// Rozpoczęcie działania strony
start();