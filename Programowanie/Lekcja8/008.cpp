#include <iostream>
#include <vector>
#include <algorithm>
#include <ctime>
#include <conio.h>
using namespace std;
void menu();
bool czyByla(vector<int> tab, int b);

int main()
{
    vector<int> losy, wybory, wygrane;
    int a;
    while (true)
    {
        system("cls");
        menu();
        a = getch();
        cout<<endl;
        if (a == 48)
            break;
        else if (a == 49)
        {
            wybory.clear();
            int b, i = 0;
            cout<<"(wpisz zero a uzyskasz chybil trafil)\n";
            while (i < 6)
            {
                cout << "Podaj liczbe: ";
                cin >> b;
                if (i == 0 && b == 0)
                {
                    for (int j = 0; j < 6; j++, i++)
                        wybory.push_back((rand() % 49) + 1);
                }
                else
                {
                    if (b < 0 || b > 49)
                        cout << "Bledna liczba!\n";
                    else if (czyByla(wybory, b))
                        cout << "Podana liczba juz zostala raz wybrana\n";
                    else
                    {
                        wybory.push_back(b);
                        i++;
                    }
                }
            }
        }
        else if (a == 50)
        {
            losy.clear();
            int b,i = 0;
            while (i<6)
            {
                b= (rand() % 49) + 1;
                if(!czyByla(losy, b))
                {
                    losy.push_back(b);
                    i++;
                }
            }
            
                
        }
        else if (a == 51)
        {
            int b = 0;
            cout<<"Wylosowano liczby: ";
            for(int i = 0; i<losy.size(); i++){
                cout<<losy[i]<<", ";
            }
            cout<<"\nTwoje liczby to: ";
            for(int i = 0; i<wybory.size(); i++){
                cout<<wybory[i]<<", ";
            }
            for(int i = 0; i<losy.size(); i++)
            {
                for(int j = 0; j<wybory.size(); j++)
                {
                    if(losy[i]==wybory[j])
                    {
                        b++;
                        wygrane.push_back(wybory[j]);
                    }
                }
            }
            cout<<"\nWspolne liczby to: ";
            for(int i = 0; i<wygrane.size(); i++){
                cout<<wygrane[i]<<", ";
            }
            cout<<"\nCo daje ci wynik: "<<b<<"\n";
            system("pause");
        }
    }

    return 0;
}

void menu()
{
    cout << "<------------------------->\n";
    cout << "[0] - wyjdz\n";
    cout << "[1] - wprowadz liczby\n";
    cout << "[2] - wylosuj liczby\n";
    cout << "[3] - sprawdz ile trafiles\n";
    cout << "<------------------------->\n\n";
    cout << "Wprowadz liczbe: ";
}
bool czyByla(vector<int> tab, int b)
{
    for (int i = 0; i < tab.size(); i++)
    {
        if (tab[i] == b)
            return 1;
    }
    return 0;
}