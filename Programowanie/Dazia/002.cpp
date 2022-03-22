#include <iostream>

int main()
{
    int n;
    std::cout << "Podaj ilosc elementow ktore chcesz wprowadzic: ";
    std::cin >> n;
    int *tab = new int[n];
    for (int i = 0; i < n; i++)
    {
        std::cout << "Podaj liczbe nr" << i + 1 << ": ";
        std::cin >> tab[i];
    }
    int symetria = 1;
    for (int i = 0; i < n; i++)
    {
        if (tab[i] != tab[n - i - 1])
        {
            symetria = 0;
            break;
        }
    }
    if (symetria)
        std::cout << "Tablice sa symetryczne\n";
    else
        std::cout << "Tablice nie sa symetryczne\n";

    int licznik = 0;
    for (int i = 0; i < n; i++)
    {
        if (tab[i] % 2)
            licznik++;
    }
    int *tab1 = new int[licznik];
    licznik = 0;
    for (int i = 0; i < n; i++)
    {
        if (tab[i] % 2)
        {
            tab1[licznik] = tab[i];
            licznik++;
        }
    }
    std::cout << "liczby nieparzyste: ";
    for (int i = 0; i < licznik; i++)
    {
        std::cout << tab1[i] << ", ";
    }
    delete[] tab;
    delete[] tab1;

    return 0;
}