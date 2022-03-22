#include <iostream>
#include <conio.h>

void liczba1();
void znak1();
void menu();
void wszechno();

int main()
{   
    int a;
    do{
    system("cls");
    menu();
    a = getch();
    // std::cout<<a;
    if(a==49)
        liczba1();
    else if(a==50)
        znak1();
    else if(a==51)
        wszechno();
    }while(a!=27&&a!=48);
}

void menu(){
    std::cout<<"<---Wybierz aplikacje--->\n";
    std::cout<<"[1] Odczytywanie kodow ASCII danego znaku\n";
    std::cout<<"[2] Wypisywanie znaku o danym kodzie ASCII \n";
    std::cout<<"[3] Wypisanie wszystkich znakow ASCII \n";
}

void liczba1(){
    char znak;
    do
    {
        std::cout<<"\nWprowadz znak: ";
        znak = getch();
        std::cout<<znak<<" = "<<int(znak);
    } while (int(znak)!=27);
}
void znak1(){
    int znak;
    do
    {
        std::cout<<"\nWprowadz liczbe: ";
        std::cin>>znak;
        std::cout<<znak<<" = "<<char(znak);
    } while (znak!=0);
}

void wszechno(){
    for(int i=0; i<256; i++)
    {
        if(i%9==0&&i!=0)
            std::cout<<std::endl;
        std::cout.width(3);
        std::cout <<i;
        std::cout.width(3);
        std::cout<<"=";
        std::cout.width(3);
        std::cout<<char(i);
        std::cout.width(3);
        std::cout<<"||";
    }
    getch();
}