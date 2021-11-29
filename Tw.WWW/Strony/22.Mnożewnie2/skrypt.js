// *przypisanie zmiennych
const a = document.getElementsByClassName("a")[0],
    b = document.getElementsByClassName("b")[0],
    ans = document.getElementsByClassName("answer1"),
    avg = document.getElementsByClassName("avg")[0],
    corr = document.getElementsByClassName("corr")[0],
    uncorr = document.getElementsByClassName("uncorr")[0],
    btn = document.getElementsByClassName("turtle")[0],
    ansBanner = document.getElementsByClassName("answer")[0]

// *przemieszanie tablicy
function shuffle(array) {
    var currentIndex = array.length,
        temporaryValue,
        randomIndex

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex)
        currentIndex -= 1

        // And swap it with the current element.
        temporaryValue = array[currentIndex]
        array[currentIndex] = array[randomIndex]
        array[randomIndex] = temporaryValue
    }

    return array
}

// *losowanie liczb
function randNumbers() {
    // *Przypisanie wartości do działania
    a.innerHTML = Math.round(((Math.random() * 10) % 9) + 1)
    b.innerHTML = Math.round(((Math.random() * 10) % 9) + 1)
    // *Stworzenie tablicy tymczasowej
    tmp = []
    // *Dodanie jako pierwszego elementu wyniku
    tmp.push(a.innerHTML * b.innerHTML)
    // *Losowanie kolejnych liczb
    for (i = 1; i < ans.length; i++) {
        tmp1 =
            Math.round(((Math.random() * 10) % 9) + 1) *
            Math.round(((Math.random() * 10) % 9) + 1)
        check = 0
        // *Sprawdzanie czy dana liczba nie jest już w tablicy
        for (j = 0; j < tmp.length; j++) {
            if (tmp1 == tmp[j]) {
                i--
                check = 1
                break
            }
        }
        // *Jeśli jej nie ma to dodanie do tablicy
        if (!check) {
            tmp.push(tmp1)
        }
    }
    // *Mieszanie tablicy
    // tmp.sort() // * Można też przemieszać sortem
    tmp = shuffle(tmp)
    // *Przepisanie tablicy tymczasowej do guzików
    for (i = 0; i < ans.length; i++) {
        ans[i].innerHTML = tmp[i]
        ans[i].style.display = "inline" //* przywrócenie widoczności guzików
}
}

// *funkcja sprawdzająca odpowiedź
function checkAns(answer) {
    // *Przypisanie liczb do zmiennych tymczasowych
    var tmp1 = parseInt(a.innerHTML),
        tmp2 = parseInt(b.innerHTML)
    // *Sprawdzanie czy wynik jest poprawny
    if (parseInt(answer.innerHTML) == tmp1 * tmp2) {// *Jeśli poprawny
        // *Zwiększenie liczb poprawnych
        corr.innerHTML = parseInt(corr.innerHTML) + 1
        // *Dodanie baneru poprawne i usunięcie błędnych
        ansBanner.classList.remove("uncorrB")
        ansBanner.classList.add("corrB")
        // *przelosowanie liczb
        randNumbers()
    } else { // *Jeśli niepoprawny
        // *Zwiększenie liczb niepoprawnych
        uncorr.innerHTML = parseInt(uncorr.innerHTML) + 1
        // *Dodanie baneru błędne i usunięcie poprawnych
        ansBanner.classList.remove("corrB")
        ansBanner.classList.add("uncorrB")
        // *Usunięcie danego guzika z widocznych
        answer.style.display = "none"
    }
    // *zaaktualizowanie średniej
    avg.innerHTML =
        parseInt(
            (parseInt(corr.innerHTML) /
                (parseInt(corr.innerHTML) + parseInt(uncorr.innerHTML))) *
                100
        ) + "%"
}

// *przypisanie onclick dla guziczków
for (i = 0; i < ans.length; i++) {
    ans[i].onclick = function () {
        checkAns(this)
    }
}

// *losowanie na początku strony
randNumbers()
