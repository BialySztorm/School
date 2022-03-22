#include <iostream>
#include <conio.h>
#include <windows.h>
void menu();
void licznik();
void fala();

int main()
{
    int type;
    do
    {
        menu();
        std::cin >> type;
        if (type == 1)
            licznik();
        if (type == 666)
            fala();
        system("pause");
    } while (type);
    return 0;
}

void menu()
{
    system("cls");
    std::cout << "<------------------------->\n";
    std::cout << "[0] Zakoncz program\n";
    std::cout << "[1] licznik\n";
    std::cout << "<------------------------->\n";
    std::cout << "\nWybierz:";
}

void licznik()
{
    for (int i = 1; i < 11; i++)
    {
        for (int j = 1; j < 11; j++)
        {
            if(j%10==1)
            {
                std::cout.width(3);
                std::cout<<"||";
            }
            std::cout.width(3);
            std::cout <<i;
            std::cout.width(3);
            std::cout <<"*";
            std::cout.width(3);
            std::cout <<j;
            std::cout.width(3);
            std::cout<<"=";
            std::cout.width(3);
            std::cout<<i*j;
            std::cout.width(3);
            std::cout<<"||";
        }
        std::cout << std::endl;
    }
}

void fala()
{
    char znak;
    int i = 1;
    do
    {
        if(i)
        {
            std::cout.width(90);
            std::cout<<i;
            i++;
        }
        _sleep(20);
    if(kbhit())
        znak = getch();
    }while(znak != 27);

}