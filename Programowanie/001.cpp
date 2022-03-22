#include <iostream>
#include <math.h>

int main()
{
    int n, j = 0;
    double wynik1 = 0, wynik2 = 0;
    std::cout << "Podaj ilosc liczb: ";
    std::cin >> n;
    for (int i = 0; i < n; i++)
    {
        int tmp = 0;
        std::cout << "Podaj liczbe: ";
        std::cin >> tmp;
        if (tmp >= 0 && !(tmp % 2))
        {
            wynik1 += sqrt(tmp);
        }
        else if (tmp % 2)
        {
            wynik2 += tmp;
            j++;
        }
    }
    if (j != 0)
        wynik2 /= j;
    std::cout << "Suma pierwiastkow liczb parzystych wynosi: " << wynik1 << std::endl;
    std::cout << "Srednia sumy liczb nieparzystych wynosi: " << wynik2 << std::endl;
    return 0;
}