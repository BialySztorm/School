#include <iostream>
#include <string>

using namespace std;

class zarowka
{
public:
    int moc;

    string rodzaj;
};

class obudowa
{
public:
    int dlugosc;

    int wysokosc;

    int szerokosc;
};

class latarka
{
public:
    zarowka charaktZarowki;

    obudowa charaktObudowy;

    string producent;

    bool gwarancja;
};

int main()
{

    latarka latarka1;

    latarka1.charaktZarowki.moc = 50;

    latarka1.charaktZarowki.rodzaj = "ledowa";

    latarka1.charaktObudowy.dlugosc = 15;

    latarka1.charaktObudowy.wysokosc = 4;

    latarka1.charaktObudowy.szerokosc = 4;

    latarka1.producent = "zarPOL";

    latarka1.gwarancja = true;

    // zdefiniuj parametry dla latarka2 i latarka3
    latarka latarka2;

    latarka2.charaktZarowki.moc = 120;

    latarka2.charaktZarowki.rodzaj = "ledowa";

    latarka2.charaktObudowy.dlugosc = 20;

    latarka2.charaktObudowy.wysokosc = 6;

    latarka2.charaktObudowy.szerokosc = 6;

    latarka2.producent = "Xiaomi";

    latarka2.gwarancja = true;

    latarka latarka3;

    latarka3.charaktZarowki.moc = 20;

    latarka3.charaktZarowki.rodzaj = "zarowa";

    latarka3.charaktObudowy.dlugosc = 5;

    latarka3.charaktObudowy.wysokosc = 2;

    latarka3.charaktObudowy.szerokosc = 2;

    latarka3.producent = "chinol";

    latarka3.gwarancja = false;

    //wyświetl dane latarek na 3 sposoby: tradycyjne, za pomocą wskaźników i referencji

    cout << "Latarka nr 1 \n";
    cout << "moc zarowki: " << latarka1.charaktZarowki.moc << "\nrodzaj zarowki: " << latarka1.charaktZarowki.rodzaj << "\ndlugosc obudowy: " << latarka1.charaktObudowy.dlugosc << "\nwysokosc obudowy: " << latarka1.charaktObudowy.wysokosc << "\nszerokosc obudowy: " << latarka1.charaktObudowy.szerokosc << "\nproducent: " << latarka1.producent << "\ngwarancja: " << latarka1.gwarancja << endl;
    cout << endl
         << endl;
    // Wyświetlanie za pomocą wskaźników
    int *l2moc = &latarka2.charaktZarowki.moc;
    string *l2rodzaj = &latarka2.charaktZarowki.rodzaj;
    int *l2dlugosc = &latarka2.charaktObudowy.dlugosc;
    int *l2wysokosc = &latarka2.charaktObudowy.wysokosc;
    int *l2szerokosc = &latarka2.charaktObudowy.szerokosc;
    string *l2producent = &latarka2.producent;
    bool *l2gwarancja = &latarka2.gwarancja;

    cout << "Latarka nr 2 \n";
    cout << "moc zarowki: " << *l2moc << "\nrodzaj zarowki: " << *l2rodzaj << "\ndlugosc obudowy: " << *l2dlugosc << "\nwysokosc obudowy: " << *l2wysokosc << "\nszerokosc obudowy: " << *l2szerokosc << "\nproducent: " << *l2producent << "\ngwarancja: " << *l2gwarancja << endl;
    cout << endl
         << endl;
    // Wyświetlanie za pomocą referencji
    int &l3moc = latarka3.charaktZarowki.moc;
    string &l3rodzaj = latarka3.charaktZarowki.rodzaj;
    int &l3dlugosc = latarka3.charaktObudowy.dlugosc;
    int &l3wysokosc = latarka3.charaktObudowy.wysokosc;
    int &l3szerokosc = latarka3.charaktObudowy.szerokosc;
    string &l3producent = latarka3.producent;
    bool &l3gwarancja = latarka3.gwarancja;

    cout << "Latarka nr 3 \n";
    cout << "moc zarowki: " << l3moc << "\nrodzaj zarowki: " << l3rodzaj << "\ndlugosc obudowy: " << l3dlugosc << "\nwysokosc obudowy: " << l3wysokosc << "\nszerokosc obudowy: " << l3szerokosc << "\nproducent: " << l3producent << "\ngwarancja: " << l3gwarancja << endl;
}
