var a = parseFloat(prompt("Podaj a: "));
var c = prompt("(+, -, *, /, %)\nPodaj działanie: ");
var b = parseFloat(prompt("Podaj b: "));
switch (c) {
    case "+":
        document.write("<div>" + a + " " + c + " " + b + " = " + (a + b) + "</div>");
        break;
    case "-":
        document.write("<div>" + a + " " + c + " " + b + " = " + (a - b) + "</div>");
        break;
    case "*":
        document.write("<div>" + a + " " + c + " " + b + " = " + (a * b) + "</div>");
        break;
    case "/":
        document.write("<div>" + a + " " + c + " " + b + " = " + (a / b) + "</div>");
        break;
    case "%":
        document.write("<div>" + a + " " + c + " " + b + " = " + (a % b) + "</div>");
        break;
    default:
        document.write("Błędne działanie");
}
