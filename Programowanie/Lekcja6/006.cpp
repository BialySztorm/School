#include <iostream>
#include <stdlib.h>
#include <time.h>

// !deklaracja funkcji
void menu();
void par(int tab[]);
void niepar(int tab[]);
int suma(int tab[]);
double srednia(int tab[]);
int min(int tab[]);
int max(int tab[]);
bool czyPierwsza(int liczba);
void pierwsza(int tab[]);

// !główna funkcja
int main()
{
    int tab[10];
    bool los = 0;
    std::cout << "Losowac liczby? 0/1";
    std::cin >> los;
    if (los)
    {
        srand(time(0));
        for (int i = 0; i < 10; i++)
        {
            tab[i] = rand() % 100;
        }
    }
    else
        for (int i = 0; i < 10; i++)
        {
            std::cout << "Wpisz liczbe nr " << i + 1 << ": ";
            std::cin >> tab[i];
        }
    do
    {
        int in;
        menu();
        std::cout << "Wybierz dzialanie: ";
        std::cin >> in;
        switch (in)
        {
        case 1:
            std::cout << "Liczby: ";
            for (int i = 0; i < 10; i++)
            {
                    std::cout << tab[i] << ", ";
            }
            std::cout << std::endl;
            break;
        case 2:
            par(tab);
            break;
        case 3:
            niepar(tab);
            break;
        case 4:
            std::cout << "Suma = " << suma(tab) << std::endl;
            break;
        case 5:
            std::cout << "Srednia = " << srednia(tab) << std::endl;
            break;
        case 6:
            std::cout << "Min = " << min(tab) << std::endl;
            break;
        case 7:
            std::cout << "Max = " << max(tab) << std::endl;
            break;
        case 8:
            pierwsza(tab);
            break;
        }
        if (!in)
            break;
        
    } while (true);
}

// !Wypisanie menu
void menu()
{
    std::cout << "<----------------------->\n";
    std::cout << "[0] Koniec programu\n";
    std::cout << "[1] Wypisz\n";
    std::cout << "[2] Parzyste\n";
    std::cout << "[3] Nieparzyste\n";
    std::cout << "[4] Suma\n";
    std::cout << "[5] Srednia\n";
    std::cout << "[6] Min\n";
    std::cout << "[7] Max\n";
    std::cout << "[8] Liczby pierwsze\n";
    std::cout << "<----------------------->\n";
}

// !Wypisanie liczb parzystych
void par(int tab[])
{
    std::cout << "Liczby parzyste: ";
    for (int i = 0; i < 10; i++)
    {
        if (!(tab[i] % 2))
        {
            std::cout << tab[i] << ", ";
        }
    }
    std::cout << std::endl;
}

// !Wypisanie liczb nieparzystych
void niepar(int tab[])
{
    std::cout << "Liczby parzyste: ";
    for (int i = 0; i < 10; i++)
    {
        if (tab[i] % 2)
        {
            std::cout << tab[i] << ", ";
        }
    }
    std::cout << std::endl;
}

// !Suma wszystkich liczb
int suma(int tab[])
{
    int tmp = 0;
    for (int i = 0; i < 10; i++)
    {
        tmp += tab[i];
    }
    return tmp;
}

// !Średnia wszystkich liczb
double srednia(int tab[])
{
    double tmp = 0;
    for (int i = 0; i < 10; i++)
    {
        tmp += tab[i];
    }
    return tmp / 10.f;
}

// !Wartość minimalna
int min(int tab[])
{
    int tmp = tab[0];
    for (int i = 1; i < 10; i++)
    {
        if (tab[i] < tmp)
            tmp = tab[i];
    }
    return tmp;
}

// !Wartość maksymalna
int max(int tab[])
{
    int tmp = tab[0];
    for (int i = 1; i < 10; i++)
    {
        if (tab[i] > tmp)
            tmp = tab[i];
    }
    return tmp;
}

// !Sprawdzanie czy liczba jest pierwszą
bool czyPierwsza(int liczba)
{
    for (int i = 2; i * i <= liczba; i++)
        if (liczba % i == 0)
            return false;
    return true;
}

// !Wtpisanie liczb pierwszych
void pierwsza(int tab[])
{
    std::cout << "Liczby pierwsze: ";
    for (int i = 0; i < 10; i++)
    {
        if (czyPierwsza(tab[i]))
            std::cout << tab[i] << ", ";
    }
    std::cout << std::endl;
}