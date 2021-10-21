#include <iostream>
#include <conio.h>
#include <cstdlib>
#include <ctime>
#include <stdlib.h>

void menu();
void Random();
void kalkulator();
void zgadywanko();

int main() // main function
{
	std::cout<<"Hello World!\n";
	int Iterator = 0;
	do
	{
		menu();
		std::cin>>Iterator;
		switch(Iterator)
		{
			case 1:
				Random();
				break;
			case 2:
				kalkulator();
				break;
			case 3:
				zgadywanko();
				break;
			default:
				break;
		}
	}while(Iterator!=0);
	
	system("cls");
	std::cout<<"See you later!\n";
	getch();
	return 0;
}

void menu() //menu on screen
{
	std::cout<<"[0]Wyjdz\n";
	std::cout<<"[1]Random\n";
	std::cout<<"[2]Kalkulator\n";
	std::cout<<"[3]Zgadywanko\n";
}

void Random() //random command
{
	system("cls");
	std::cout<<"type random number: ";
	int numberA = 0;
	std::cin>>numberA;
	std::cout<<"Your number is: "<<numberA<<std::endl;
	numberA = 666;
	std::cout<<"No longer XOXO, your number now is: "<<numberA<<std::endl;
}

void kalkulator() //kalkulator module
{
	bool working = 1;
	do
	{
		system("cls");
		std::cout<<"Wybierz typ dzialania: \n";
		int dzialanie = 0;
		std::cout<<"[1] Dodawanie\n";
		std::cout<<"[2] Odejmowanie\n";
		std::cout<<"[3] Mnozenie\n";
		std::cout<<"[4] Dzielenie\n";
		std::cout<<"\n---type something else to exit---\n";
		std::cout<<"\nWybor: ";
		std::cin>> dzialanie;
		if(dzialanie < 1 || dzialanie > 4)
		{
			working = 0;
			continue;
		}
		std::cout<<"a = ";
		double a;
		std::cin>>a;
		std::cout<<"b = ";
		double b;
		std::cin>>b;
		
		switch (dzialanie)
		{
			case 1:
				std::cout<<a<<" + "<<b<<" = "<<a+b<<std::endl;
				break;
			case 2:
				std::cout<<a<<" - "<<b<<" = "<<a-b<<std::endl;
				break;
			case 3:
				std::cout<<a<<" * "<<b<<" = "<<a*b<<std::endl;
				break;
			case 4:
				if(b!=0)
					std::cout<<a<<" / "<<b<<" = "<<a/b<<std::endl;
				else
					std::cout<<"nie dziel przez zero!!!\n";
				break;
			default:
				break;
				
		}
		system("pause");
	}while(working);
}

void zgadywanko() //guess number game
{
	int typ;
    int proby;
    bool gra=0;
    int wynik=0;
    int liczba;
    do
    {
        system("cls");
        srand( time( NULL ) );
        liczba =( std::rand() % 1000 ) + 1;
        proby=0;
    do
    {
        std::cout<<"Zgadnij liczbe:";
        std::cin>>typ;
        if(typ<liczba && typ<=1000 && typ>0)
            std::cout<<"Za malo stary"<<std::endl;
        else if(typ>liczba && typ<=1000 && typ>0)
            std::cout<<"Za duzo stary"<<std::endl;
        else if(typ>1000 || typ<=0)
        {
            std::cout<<"Poza zakresem"<<std::endl;
            proby--;
        }
        proby++;
    }while(typ!=liczba);
    std::cout<<"Gratulacje! Udalo ci sie odgadnac liczbe "<<liczba<<" za "<<proby<<" razem!"<<std::endl;
    wynik++;
    std::cout<<std::endl<<"Twoj obecny wqynik to: "<<wynik<<std::endl;
    std::cout<<std::endl<<"Gramy dalej? (1/0)";
    std::cin>>gra;
    }while(gra==1);
    system("cls");
}
