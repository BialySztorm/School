#include <iostream>
#include <fstream>
#include <string>
#include <algorithm>

using namespace std;

int main()
{
    string odp, linia, linia1;
    float punkty = 0;
    int nr_linii = 0, a=4;
    fstream plik;
    plik.open("pliki/odpowiedzi.txt", ios::out);
    fstream plik2;
    plik2.open("pliki/pytania.txt", ios::in);
    while (getline(plik2, linia))
    {
        nr_linii++;
        if (nr_linii==1)
            continue;
        if (nr_linii==2)
        {
            int j = atoi(linia.c_str());
            for(int i=0;i<j;i++)
                a++;
            continue;
        }
        cout << linia;
        if ((nr_linii - 2) % a == 0)
        {
            cin >> odp;
            transform(odp.begin(), odp.end(), odp.begin(), ::toupper);
            plik << odp << endl;
            system("cls");
        }
        cout << endl;
    }
    plik2.close();

    plik.close();
    plik.open("pliki/odpowiedzi.txt", ios::in);
    fstream plik1;
    plik1.open("pliki/klucz.txt", ios::in);

    while (getline(plik, linia) && getline(plik1, linia1))
        {
            transform(linia.begin(), linia.end(), linia.begin(), ::toupper);
            transform(linia1.begin(), linia1.end(), linia1.begin(), ::toupper);
        if (linia == linia1)
            punkty++;
        }
    
    plik.close();
    plik1.close();
    cout << "Uzyskane punkty: " << punkty << "/" << nr_linii / 7 << endl;
    punkty/=nr_linii/7;
    cout << "Ocena: ";
    if (punkty == 1)
        cout << "bdb";
    else if (punkty >= 0.75)
        cout << "db";
    else if (punkty >= 0.5)
        cout << "dst";
    else if (punkty >= 0.25)
        cout << "dop";
    else
        cout << "ndst";

    cout << "\n\n";
    system("pause");
}